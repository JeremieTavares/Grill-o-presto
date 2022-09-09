<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Info_user;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const USER_ROLE_CLIENT = 1;
    const ADMIN_ROLE_1 = 2;
    const ADMIN_ROLE_2 = 3;
    const ADMIN_ROLE_3 = 4;

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'info_user_id',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function info_user()
    {
        return $this->belongsTo(Info_user::class);
    }


    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
