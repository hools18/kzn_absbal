<?php

namespace App\Models\UserInterface;

use Illuminate\Database\Eloquent\Model;

class PublicKey extends Model
{
    protected $fillable = [
        'key_id',
        'hash_key'
    ];
}
