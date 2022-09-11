<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketState extends Model
{

    public $TICKET_STATE_OUVERT;

   public function getAllTicketState(){
    $tickets = Ticket::all();

    foreach($tickets as $state){
         if($state->state == 'Ouvert'){
            return $this->TICKET_STATE_OUVERT == $state->state;
         }
    }
   }


    const TICKET_STATE_OPEN = 1;
    const TICKET_STATE_CLOSE = 2;
    const TICKET_STATE_EXPIRED = 3;
    const TICKET_STATE_NOT_RESOLVED = 4;

    protected $fillable = [
        'state'
    ];
    use HasFactory;

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
