<?php
session_start();
define('INSTALL', '/Lape/uztvanka/public/');
define('DIR', __DIR__. '/');
define('URL', 'http://localhost/Lape/uztvanka/public/');

require DIR.'vendor/autoload.php';


function showMessages()
{
    return Bebru\Uztvanka\App::showMessages();
}

function isLogged() 
{
    return Bebru\Uztvanka\App::isLogged();
}



