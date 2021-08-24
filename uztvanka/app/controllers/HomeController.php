<?php
namespace Bebru\Uztvanka\Controllers;

use Bebru\Uztvanka\App;

class HomeController
{
    public function home()
    {
        return App::view('home');
    }
}