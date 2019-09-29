<?php

namespace App\Models\UserInterface;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'birthday',
        'login',
        'password',
        'email',
        'phone',
        'biometrics',
        'confirmation_date',
        'device_id'
    ];

    public function getFullName()
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
    }

    public function keys()
    {
        return $this->hasMany(Key::class);
    }

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }
    public function count_keys()
    {
        return $this->keys()->count();
    }
}
