<?php

namespace App\Models\PrivateInterface;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'birthday',
        'login',
        'email',
        'phone',
        'biometrics',
    ];
}
