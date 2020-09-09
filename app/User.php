<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function plugins()
    {
        return $this->hasMany(Plugin::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function steamAuth()
    {
        return $this->hasOne(SteamAuth::class);
    }

    public function getUsername()
    {
        if ($this->name)
            return $this->name;
        if ($this->steamAuth)
            return $this->steamAuth->name;
        return 'no-name';
    }

    public function getAvatar()
    {
        if ($this->steamAuth)
            return $this->steamAuth->avatar;
        else
            return "https://st3.depositphotos.com/1767687/16607/v/450/depositphotos_166074422-stock-illustration-default-avatar-profile-icon-grey.jpg";
    }

    public function hasAnyRoles($roles)
    {
        if ($this->roles()->whereIn('name', $roles)->first())
        {
            return true;
        }

        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first())
        {
            return true;
        }

        return false;
    }
}
