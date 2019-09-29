<?php


namespace App\Models\UserInterface;


use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'time_expired',
        'hash_key',
        'is_active',
        'inactive_time',
    ];

    public function public_key()
    {
        return $this->hasOne(PublicKey::class);
    }

}
