<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }

    public function ticket_type()
    {
        return $this->belongsTo(Ticket_type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
