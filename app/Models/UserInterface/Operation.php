<?php

namespace App\Models\UserInterface;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
       'external_id',
       'user_id',
       'key_id',
       'contract_id',
       'rejection_reason',
       'confirmation_time',
       'crypto_data',
    ];
}
