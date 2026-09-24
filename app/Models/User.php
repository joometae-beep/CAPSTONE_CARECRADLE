<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
protected $fillable = [
    'username',

    'first_name',
    'middle_name',
    'last_name',
    'contact_number',

    'name',

    'email',

    'password',

    'role',

    'is_active',
];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function mother()
    {
        return $this->hasOne(Mother::class);
    }
}