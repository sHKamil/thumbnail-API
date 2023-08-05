<?php

function dd($any) {
    die(var_dump($any));
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function autoloader($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

    $filePath = base_path($className . '.php');
    if (file_exists($filePath)) {
        return require $filePath;
    }
}
