<?php
/**
 * phpunit
 */

error_reporting(E_ALL);
ini_set('display_errors', 'On');
date_default_timezone_set('Asia/Shanghai');

spl_autoload_register(function ($class) {
    $file = null;

    if (0 === strpos($class,'MyLib\File\Example\\')) {
        $path = str_replace('\\', '/', substr($class, strlen('MyLib\File\Example\\')));
        $file = dirname(__DIR__) . "/examples/{$path}.php";
    } elseif (0 === strpos($class,'MyLib\File\Test\\')) {
        $path = str_replace('\\', '/', substr($class, strlen('MyLib\File\Test\\')));
        $file = dirname(__DIR__) . "/{$path}.php";
    } elseif (0 === strpos($class,'MyLib\File\\')) {
        $path = str_replace('\\', '/', substr($class, strlen('MyLib\File\\')));
        $file = dirname(__DIR__) . "/src/{$path}.php";
    }

    if ($file && is_file($file)) {
        include $file;
    }
});
