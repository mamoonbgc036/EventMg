<?php
function my_autoload($class_name)
{
    $file = __DIR__ . '/' . str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($file)) {
        require $file;
    }
}

spl_autoload_register('my_autoload');