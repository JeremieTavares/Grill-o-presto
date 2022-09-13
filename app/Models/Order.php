<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'prenom',
        'nom',
        'rue',
        'no_porte',
        'appartement',
        'code_postal',
        'ville',
        'telephone',
        'email',
        'menu_id',
        'prix',
        'order_number',
        'is_guest',
        'order_status_id',
        'portion_id',
        'meals'
    ];
    use HasFactory;
}
