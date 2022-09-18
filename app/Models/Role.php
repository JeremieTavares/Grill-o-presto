<?php

namespace App\Models;

use App\Models\User;
use App\Trait\RolesAvailable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{

    use HasFactory;
    use RolesAvailable;


    protected $fillable = [
        'role'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
