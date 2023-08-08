<?php

namespace Controller;

class UrlController {

    public $mode;

    public function __construct($uri) {
        if($uri === '/api') {
            $this->mode = 'api';
        } else if ($uri === '/') {
            $this->mode = 'view';
        }
    }
}
