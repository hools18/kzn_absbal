<?php

namespace App\Models\UserInterface;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'external_id',
        'text',
    ];
}
