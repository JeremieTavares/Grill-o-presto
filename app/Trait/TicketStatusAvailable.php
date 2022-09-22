<?php

namespace App\Trait;

use App\Models\Role;


trait TicketStatusAvailable
{
    private $TICKET_TYPE;
    private $TICKET_STATUS_OUVERT;
    private $TICKET_STATUS_CLOSE;
    private $TICKET_STATUS_EXPIRED;
    private $TICKET_STATUS_NOT_RESOLVED;

    public function get_status($status)
    {
        return $this->TICKET_TYPE = $this->getAllTicketstatus($status);
    }

    public function get_opened_status()
    {
        return $this->TICKET_STATUS_OUVERT = $this->getAllTicketstatus('Ouvert');
    }

    public function get_closed_status()
    {
        return $this->TICKET_STATUS_CLOSE = $this->getAllTicketstatus('Fermé');
    }

    public function get_expired_status()
    {
        return $this->TICKET_STATUS_EXPIRED = $this->getAllTicketstatus('Expiré');
    }

    public function get_not_resolved_status()
    {
        return $this->TICKET_STATUS_NOT_RESOLVED = $this->getAllTicketstatus('Non-résolu');
    }



    public function getAllTicketstatus($type = null)
    {
        $tickets = $this->all();
        foreach ($tickets as $status) {
            if ($type == $status->status) {
                return $this->TICKET_STATUS_OUVERT = $status->id;
            } elseif ($type == $status->status) {
                return $this->TICKET_STATUS_CLOSE = $status->id;
            } elseif ($type == $status->status) {
                return $this->TICKET_STATUS_EXPIRED = $status->id;
            } elseif ($type == $status->status) {
                return $this->TICKET_STATUS_NOT_RESOLVED = $status->id;
            }
        }
    }
}
