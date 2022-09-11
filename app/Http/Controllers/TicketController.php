<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\TicketState;
use Illuminate\Http\Request;
use App\Http\Requests\TicketRequest;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $authUserId = (int) Auth::user()->id;

        $allTicketsForLoggedUser = (object) Ticket::GetAllTicketInfosAndRelations($authUserId)->get();

        $ticketArray = (array) [];

        for ($i = 0; $i < count($allTicketsForLoggedUser); $i++) {
            $allTicketsForLoggedUser[$i]['date'] = (string) date('d-m-Y', strtotime($allTicketsForLoggedUser[$i]->created_at));
            $allTicketsForLoggedUser[$i]['description'] = (string) substr($allTicketsForLoggedUser[$i]->description, 0, 50);
            array_push($ticketArray,  $allTicketsForLoggedUser[$i]);
        }

        return (object) view('user.user-tickets', ['ticketsArray' => (object) $ticketArray]);
    }

    public function indexFaq()
    {
        return (object) view('public.faq');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeTickets = (object) TicketType::all('id', 'type');
        return (object) view('user.user-tickets-create', ['ticketTypes' => (object) $typeTickets]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        $validatedData = $request->validated();

        if ((bool) Auth::check()) {
            $authUserId = (int) Auth::user()->id;
            $user = (object) User::where('id', (int) $authUserId)->get('email');
        }

        $ticketNumber = mt_rand(10000, 2147483647);
        $ticketTypeOpen = (object) TicketState::where('state', 'Ouvert')->get();


        $newTicket = Ticket::create([
            'ticket_number' => (int) $ticketNumber,
            'ticket_type_id' => (int) $request->ticket_type_id,
            'ticket_state_id' => (int) $ticketTypeOpen[0]->id,
            'user_id' => Auth::check() ? (int)$authUserId : NULL,
            'email' => Auth::check() ? (string) $request->email : NULL,
            'description' => $request->description
        ]);

        return back()->with('SuccessTicket', 'Votre ticket a bien été envoyé');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $ticketMessages = (object) Message::GetAllMessagesFromATicket($id)->get();

        return (object) view('user.user-tickets-show', ['ticketMessages' => (object) $ticketMessages]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $authUserId = (int) Auth::user()->id;
        $admin = User::where('id', $authUserId)->get('role_id');
        $ticket = (object) Ticket::where('id', (int)$request->ticket_id)->get('id', 'ticket_state_id','user_id');

        $d = new TicketState();
        $d->getAllTicketState();
        dd($d);

        if (
            $ticket[0]->user_id == 33 ||
            (int) $admin[0]->role_id === (int)User::ADMIN_ROLE_1 ||
            (int) $admin[0]->role_id === (int)User::ADMIN_ROLE_2 ||
            (int) $admin[0]->role_id === (int)User::ADMIN_ROLE_3){
            
            } else
            return back()->with('noPermission', 'Vous n\'avez pas la permission pour cela');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
