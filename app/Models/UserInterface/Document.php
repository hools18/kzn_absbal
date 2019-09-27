<?php


namespace App\Models\UserInterface;


use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'user_id',
        'series',
        'number',
        'issuing_authority',
        'date_of_issue',
        'time_expired',
        'type',
    ];
}
