<?php

class TV {

    public $owner; // ==> $this->owner
    public $chanel;
    private $in; // planuojam gal 42 o gal 55 o gal dar kazka


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
    }

}