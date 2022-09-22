<?php

namespace App\Http\Controllers\Admin\gestionTicket;

use App\Models\Ticket;
use App\Models\Message;
use App\Models\TicketStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GestionTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::getAllTicketInfosAndRelationsForAdmin()->get();

        $ticketArray = [];

        for ($i = 0; $i < count($tickets); $i++) {
            $tickets[$i]['date'] = (string) date('d-m-Y', strtotime($tickets[$i]->created_at));
            $tickets[$i]['description'] = (string) substr($tickets[$i]->description, 0, 50);
            array_push($ticketArray,  $tickets[$i]);
        }
        return (object) view('admin.gestionTicket.ticket-index', ['ticketsArray' => $ticketArray]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $states = (object) new TicketStatus();
        $opened = (int) $states->get_opened_status();
        $closed = (int) $states->get_closed_status();
        $expired = (int) $states->get_expired_status();
        $not_resolved = (int) $states->get_not_resolved_status();
        $ticketMessages = (object) Message::GetAllMessagesFromATicket($id)->get();
        $ticket = Ticket::where('id', $id)->get();

        return (object) view(
            'admin.gestionTicket.ticket-show',
            [
                'ticketMessages' => (object) $ticketMessages,
                'ticket' => (object) $ticket,
                'ticket_status' => $ticket[0]->ticket_status_id,
                'ticket_opened' =>(int) $opened,
                'ticket_closed' => (int) $closed,
                'ticket_expired' => (int) $expired,
                'ticket_not_resolved' => (int) $not_resolved
            ]
        );
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
