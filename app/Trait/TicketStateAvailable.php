<?php

namespace App\Trait;

use App\Models\Role;


trait TicketStateAvailable
{
    private $TICKET_TYPE;
    private $TICKET_STATE_OUVERT;
    private $TICKET_STATE_CLOSE;
    private $TICKET_STATE_EXPIRED;
    private $TICKET_STATE_NOT_RESOLVED;

    public function get_state($state)
    {
        return $this->TICKET_TYPE = $this->getAllTicketState($state);
    }

    public function get_opened_state()
    {
        return $this->TICKET_STATE_OUVERT = $this->getAllTicketState('Ouvert');
    }

    public function get_closed_state()
    {
        return $this->TICKET_STATE_CLOSE = $this->getAllTicketState('Fermé');
    }

    public function get_expired_state()
    {
        return $this->TICKET_STATE_EXPIRED = $this->getAllTicketState('Expiré');
    }

    public function get_not_resolved_state()
    {
        return $this->TICKET_STATE_NOT_RESOLVED = $this->getAllTicketState('Non-résolu');
    }



    public function getAllTicketState($type = null)
    {
        $tickets = $this->all();
        foreach ($tickets as $state) {
            if ($type == $state->state) {
                return $this->TICKET_STATE_OUVERT = $state->id;
            } elseif ($type == $state->state) {
                return $this->TICKET_STATE_CLOSE = $state->id;
            } elseif ($type == $state->state) {
                return $this->TICKET_STATE_EXPIRED = $state->id;
            } elseif ($type == $state->state) {
                return $this->TICKET_STATE_NOT_RESOLVED = $state->id;
            }
        }
    }
}
