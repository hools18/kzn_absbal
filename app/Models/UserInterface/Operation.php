<?php

namespace App\Models\UserInterface;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
       'external_id',
       'user_id',
       'key_id',
       'document_id',
       'rejection_reason',
    ];
}
