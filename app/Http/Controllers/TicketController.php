<?php

namespace App\Http\Controllers;


use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Http\Request;
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
        for ($i = 0; $i < count((array) $allTicketsForLoggedUser); $i++) {
            $allTicketsForLoggedUser[$i]['date'] = (string) date('d-m-Y', strtotime($allTicketsForLoggedUser[$i]->created_at));
            $allTicketsForLoggedUser[$i]['description'] = (string) substr($allTicketsForLoggedUser[$i]->description, 0, 50);

            array_push($ticketArray,  $allTicketsForLoggedUser[$i],  $allTicketsForLoggedUser[$i]);
        }

        return (object) view('user.user-tickets', ['ticketsArray' => (array) $ticketArray]);
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

        $typeTickets = (object) TicketType::all('type');
        return (object) view('user.user-tickets-create', ['ticketTypes' => (array) $typeTickets]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
