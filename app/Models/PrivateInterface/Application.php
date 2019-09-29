<?php

namespace App\Models\PrivateInterface;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Application extends Model  implements HasMedia
{
    use HasMediaTrait;

    protected $connection = 'private_db';

    protected $fillable = [
        'serial',
        'number',
        'client_id',
        'reason_reject',
        'is_check',
    ];

    public function getPhotoDoc()
    {
        if($this->getFirstMedia('photo_document')){
            return $this->getFirstMediaUrl('photo_document');
        }
        return '/image/no_photo.png';
    }

    public function getPhotoClient()
    {
        if($this->getFirstMedia('photo_client')){
            return $this->getFirstMediaUrl('photo_client');
        }
        return '/image/no_photo.png';
    }
}
