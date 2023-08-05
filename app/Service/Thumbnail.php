<?php

namespace Service;

class Thumbnail
{

    public function makeThumbnail($temp, $destination) : string
    {
        $thumbnailPath = $destination;

        $imagick = new \Imagick();
        $imagick->readImage($temp);

        $imagick->setIteratorIndex(0);

        $thumbnailFile = $thumbnailPath . basename($temp) . '.jpg';
        $imagick->writeImage($thumbnailFile);

        $imagick->clear();
        $imagick->destroy();
        return $thumbnailPath;
    }
}
