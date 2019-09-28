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

    public function getFullName()
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
    }

    public function keys()
    {
        return $this->hasMany(Key::class);
    }
    public function count_keys()
    {
        return $this->keys()->count();
    }
}
