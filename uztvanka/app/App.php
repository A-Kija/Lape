<?php
namespace Bebru\Uztvanka;

use Bebru\Uztvanka\Controllers\UztvankaController;
use Bebru\Uztvanka\Controllers\LoginController;
use Bebru\Uztvanka\Controllers\HomeController;

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
            return (new HomeController)->home();
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

        $update = ['add-black', 'rem-black', 'add-brown', 'rem-brown'];
        if ('POST' == $_SERVER['REQUEST_METHOD'] && 2 == count($url) && in_array($url[0], $update)) {
            return (new UztvankaController)->update($url[0], $url[1]);
        }

        if ('POST' == $_SERVER['REQUEST_METHOD'] && 2 == count($url) && 'delete' == $url[0]) {
            return (new UztvankaController)->delete($url[1]);
        }

        if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && 'login' === $url[0]) {
            return (new LoginController)->showLogin();
        }

        if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && 'login' === $url[0]) {
            return (new LoginController)->login();
        }

        if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && 'logout' === $url[0]) {
            return (new LoginController)->logout();
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

    // type success|danger
    public static function addMessage(string $type, string $msg) : void
    {
        $_SESSION['msg'][] = ['type' => $type, 'msg' => $msg];
    }

    public static function clearMessages() : void
    {
        $_SESSION['msg'] = [];
    }

    public static function showMessages() : void
    {
        $messages = $_SESSION['msg'];
        self::clearMessages();
        self::view('msg', ['messages' => $messages]);
    }

    public static function isLogged()
    {
        return isset($_SESSION['login']) && $_SESSION['login'] == 1;
    }


    

}