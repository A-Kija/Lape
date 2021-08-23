<?php
namespace Bebru\Uztvanka;

use Bebru\Uztvanka\Controllers\UztvankaController;

class App {


    public static function start() 
    {
        self::router();

    }

    public static function router() 
    {
        $url = str_replace(INSTALL, '', $_SERVER['REQUEST_URI']);
        $url = explode('/', $url);

        if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && '' === $url[0]) {
            return (new UztvankaController)->home();
        }

        if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && 'create' === $url[0]) {
            return (new UztvankaController)->create();
        }

        if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && 'create' === $url[0]) {
            return (new UztvankaController)->save();
        }

        if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && 'list' === $url[0]) {
            return (new UztvankaController)->index();
        }
        
    }

    public static function view($name, $data = []) 
    {
        extract($data);
        require DIR . "view/$name.php";
    }

    public static function redirect($url) 
    {
        header('Location: '.URL.$url);
        die;
    }

    

}