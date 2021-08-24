<?php
namespace Bebru\Uztvanka\Controllers;

use Bebru\Uztvanka\App;
use Bebru\Uztvanka\Login\Json;

class LoginController
{
    private $settings = 'Json';
    // private $settings = 'Maria';

    private function get()
    {
        $db = 'Bebru\\Uztvanka\\Login\\'.$this->settings;
        return $db::get();
    }

    public function showLogin()
    {
        return App::view('login');
    }

    public function login()
    {
        $name = $_POST['name'] ?? ''; // ivestas el pastas
        $pass = md5($_POST['pass']) ?? '';
        $user = $this->get()->show($name);
        if (empty($user)) {
            App::addMessage('danger', 'Kažkas blogai');
            App::redirect('login');
        }
        if ($user['pass'] == $pass) {
            $_SESSION['login'] = 1;
            $_SESSION['name'] = $user['name'];
            App::addMessage('success', 'Sėkmingai prisijungta');
            App::redirect('list');
        }
        App::addMessage('danger', 'Kažkas blogai');
        App::redirect('login');
    }

    public function logout()
    {
        unset($_SESSION['login'], $_SESSION['name']);
        App::addMessage('success', 'Puikiai atsijungta, šaunuolytė!');
        App::redirect('login');
    }
}