<?php

namespace Controller;


use Service\Thumbnail;

class ThumbnailController
{
    public $temp_path;
    public $thumbnail_path;

    public function __construct($uri) {
        if($uri === '/api' && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $this->setParams();
            echo $this->generateThumbnail();
        } else {
            echo 'Something went wrong.';
        }
    }

    protected function setParams() : void
    {
        $this->temp_path = $_FILES['file']['tmp_name'];
        $this->thumbnail_path = base_path('thumbnails/'. uniqid() . '.jpg');
        return;
    }

    protected  function generateThumbnail()
    {
        $thumbnail = new Thumbnail;
        return $thumbnail->makeThumbnail($this->temp_path, $this->thumbnail_path);
    }
}
