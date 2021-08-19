<?php
namespace Start;

use Kosmosas\Antena;

class TV extends Antena
{
    public static $programs = [1 => 'LRT', 2 => 'TV7', 3 => 'TV Polonia'];
    

    public $etikete = 'Televizorius';

    
    public $owner; // ==> $this->owner
    public $chanel;
    private $in; // planuojam gal 42 o gal 55 o gal dar kazka
    
    private $nowWatching;

    public function ijungti($bilekas) 
    {
        _d('TV Įjungtas');
    }

    public function __construct($in, $dk = 0)
    {
        $this->in = $in;
    }


    public function sellTo($name)
    {
        // $owner;
        $this->owner = $name;
        // $la55;
        // $bla55;
    }

    public function switchCanel($number)
    {
        $this->chanel = $number;
        $this->nowWatching = TV::$programs[$number];
    }

    public function kaTu(){}
}

