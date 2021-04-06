<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function roles()
    {
        return $this->belongsToMany(Role::class,'role_users','user_id','role_id');
    }

    function checkRoles($role_id)
    {
        foreach ($this->roles as $role)
        {
            if ($role->id == $role_id){
                return true;
            }
        }
        return  false;

    }
}
