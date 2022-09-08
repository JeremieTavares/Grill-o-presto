<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'telephone',
        'rue',
        'no_porte',
        'code_postal',
        'ville'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
