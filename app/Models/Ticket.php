<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = [
        'ticket_number',
        'ticket_type_id',
        'description',
        'user_id'
    ];

    use HasFactory;

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }

    public function ticket_type()
    {
        return $this->belongsTo(TickeType::class);
    }


    public function ticket_state()
    {
        return $this->belongsTo(TicketState::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
