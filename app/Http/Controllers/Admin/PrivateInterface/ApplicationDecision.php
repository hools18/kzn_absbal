<?php

namespace App\Http\Controllers\Admin\PrivateInterface;

use Illuminate\Database\Eloquent\Model;

class ApplicationDecision extends Model
{
    protected $connection = 'private_db';
    protected $table = 'application_decision';

    protected $fillable = [
        'user_id',
        'client_id',
        'rejection_reason',
    ];

}
