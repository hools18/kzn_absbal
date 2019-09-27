<?php

namespace App\Models\UserInterface;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
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
}
