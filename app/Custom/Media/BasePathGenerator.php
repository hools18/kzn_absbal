<?php

namespace App\Custom\Media;

use Spatie\MediaLibrary\PathGenerator\PathGenerator;
use Spatie\MediaLibrary\Models\Media;

class BasePathGenerator implements PathGenerator
{
    public function getPath(Media $media = null): string
    {
        return get_media_path($media->getKey()).$media->name.'/';
    }

    public function getPathForConversions(Media $media): string
    {
        return get_media_path($media->getKey()).$media->name.'/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return get_media_path($media->getKey()).$media->name.'/';
    }
}
