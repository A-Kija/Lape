<?php
// Marytės failas
class Bebras {

    public $tailLong = 45;
    private $color = 'Brown';
    private $age = 42;



    public function who() 
    {
        return 'Aš esu Bebras';
    }


    public function __get($prop) 
    {
        _d($prop, 'Magic ==========>');

        if (in_array($prop, ['age'])) {
            return 'fY';
        }
        return $this->$prop;
    }

    public function __set($prop, $value) 
    {
        if ('black' == $value && 'color' == $prop) {
            return;
        }
        $this->$prop = $value;
    }



    // public function setColor($color)
    // {
    //     if ('black' == $color) {
    //         return;
    //     }
        
    //     $this->color = $color;
    // }


    // public function getColor()
    // {
    //     return $this->color;
    // }

}