<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketState extends Model
{

    protected $fillable = [
        'state'
    ];
    use HasFactory;

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
