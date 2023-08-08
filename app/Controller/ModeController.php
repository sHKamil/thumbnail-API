<?php

namespace Controller;

class ModeController {

    public function __construct(UrlController $urlController) {
        if($urlController->mode === 'api') {
            new ThumbnailController;
        } else if ($urlController->mode === 'view') {
            require_once base_path('/Views/gui.php');
        }
    }
}