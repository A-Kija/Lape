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
    
    public function home()
    {
        return App::view('home');
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
        App::redirect('');
    }


}