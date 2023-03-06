<?php
spl_autoload_register('modelLoader');
spl_autoload_register('controllerLoader');

function modelLoader($className)
{
    $path = $_SERVER['DOCUMENT_ROOT'] . '/classes/models/'.$className.'.php';
    
    if(file_exists($path))
    {
        include $path;
    }
}


function controllerLoader($className)
{
    $path = $_SERVER['DOCUMENT_ROOT'] . '/classes/controllers/'.$className.'.php';

    if(file_exists($path))
    {
        include $path;
    }
}

