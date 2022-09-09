<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'response',
        'user_id',
        'ticket_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
