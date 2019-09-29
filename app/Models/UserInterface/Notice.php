<?php

namespace App\Models\UserInterface;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'type',
        'operation_id'
    ];

    protected $table = 'notice';
}
