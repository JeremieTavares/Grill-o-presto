<?php

namespace App\Models;

use App\Models\Ticket;
use App\Trait\TicketStateAvailable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketState extends Model
{
    use TicketStateAvailable;
    
    protected $fillable = [
        'state'
    ];


    use HasFactory;

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
