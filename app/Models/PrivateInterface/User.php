<?php

namespace App\Models\PrivateInterface;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $connection = 'private_db';
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

    public function getFullName()
    {
        return $this->surname.' '. $this->name.' '. $this->patronymic;
    }
}
