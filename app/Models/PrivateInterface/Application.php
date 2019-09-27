<?php

namespace App\Models\PrivateInterface;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'serial',
        'number',
        'client_id',
    ];
}
