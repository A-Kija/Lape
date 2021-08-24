<?php
namespace Bebru\Uztvanka\Controllers;

use Bebru\Uztvanka\App;
use Bebru\Uztvanka\Json;

class UztvankaController {

    private $settings = 'Json';
    // private $settings = 'Maria';

    private function get()
    {
        $db = 'Bebru\\Uztvanka\\'.$this->settings;
        return $db::get();
    }

    public function __construct()
    {
        if (!App::isLogged()) {
            App::redirect('login');
        }
    }
    
    public function index()
    {
        $bebrai = $this->get()->showAll();
        //
        // $db_objektas = $this->get();
        // $bebrai = $db_objektas->showAll();

        return App::view('pirmas', ['bebrai' => $bebrai]);
    }

    public function create()
    {
        return App::view('naujas');
    }

    public function save()
    {
        $nr = rand(1000000000, 9999999999); // netikras unikalus skaicius
        $nauja = ['juodieji' => 0, 'rudieji' => 0, 'id' => $nr];
        $this->get()->create($nauja);
        App::addMessage('success', 'Užtvanka sukurta');
        App::redirect('list');
    }


    public function update($action, $id)
    {
        $uztvanka = $this->get()->show($id);

        if ('add-black' == $action) {
            $uztvanka['juodieji'] += (int)$_POST['count'];
            App::addMessage('success', 'Pridėta juodų bebrų');
        }
        elseif ('add-brown' == $action) {
            $uztvanka['rudieji'] += (int)$_POST['count'];
            App::addMessage('success', 'Pridėta rudų bebrų');
        }
        elseif ('rem-black' == $action) {
            $uztvanka['juodieji'] -= (int)$_POST['count'];
            App::addMessage('success', 'Atimta juodų bebrų');
        }
        elseif ('rem-brown' == $action) {
            $uztvanka['rudieji'] -= (int)$_POST['count'];
            App::addMessage('success', 'Atimta rudų bebrų');
        }

        $this->get()->update($id, $uztvanka);
        App::redirect('list');
    }


    public function delete($id)
    {
        $this->get()->delete($id);
        App::addMessage('success', 'Užtvanka sugriauta');
        App::redirect('list');
    }


}