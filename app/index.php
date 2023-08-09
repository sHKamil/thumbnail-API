<?php

const BASE_PATH = __DIR__ . DIRECTORY_SEPARATOR;
require_once BASE_PATH . 'functions.php';
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
spl_autoload_register('autoloader');

use Controller\ModeController;
use Controller\UrlController;

new ModeController(new UrlController($uri));
