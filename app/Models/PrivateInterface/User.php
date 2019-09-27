<?php

namespace App\Models\PrivateInterface;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $connection = '';
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
        'workplace',
        'unit_number',
    ];
}
