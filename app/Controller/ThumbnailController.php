<?php

namespace Controller;


use Service\Thumbnail;

class ThumbnailController
{
    public $temp_path;
    public $thumbnail_path;
    public $image_name;

    public function __construct() {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $this->setParams();
            $this->generateThumbnail();
            $link = $this->_prepareLink();
            echo "<img src='{$link}'>";
        } else {
            echo 'Something went wrong.';
        }
    }

    protected function setParams() : void
    {
        $this->temp_path = $_FILES['file']['tmp_name'];
        $this->image_name = uniqid() . '.jpg';
        $this->thumbnail_path = base_path('thumbnails/'. $this->image_name);
        return;
    }

    protected  function generateThumbnail()
    {
        $thumbnail = new Thumbnail;
        return $thumbnail->makeThumbnail($this->temp_path, $this->thumbnail_path);
    }

    private function _prepareLink() : string
    {
        $port = $_SERVER['SERVER_PORT'];
        $protocol = $port === '443' ? 'https://' : 'http://';
        $link = $protocol . $_SERVER['SERVER_NAME'] . ':' . $port . '/thumbnails/' . $this->image_name;
        return $link;
    }
}
