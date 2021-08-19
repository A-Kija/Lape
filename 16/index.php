<?php


spl_autoload_register(function ($name) {
    _d("mes norim klases: $name");
});

// spl_autoload_register(function ($name) {
//     var_dump('Fake 2');
// });


spl_autoload_register(function ($name) {
    require __DIR__ ."/$name.php";
});


// require __DIR__ .'/Gabalas.php';
// require __DIR__ .'/Radijus.php';
// require __DIR__ .'/Televizija.php';
// require __DIR__ .'/Bliudas.php';
// require __DIR__ .'/Antena.php';
// require __DIR__ .'/TV.php';






$tv1 = new Start\TV(42, 88);
$tv2 = new Start\TV(42);
$tv3 = new Start\TV(55);


Start\TV::$programs = [1 => 'LRT', 2 => 'LNK', 3 => 'TV Polonia'];


var_dump($tv3 instanceof Radijus);

//$tv1
// public function switchCanel($number)
// {
//     $tv1->chanel = $number;
// }

//$tv2
// public function switchCanel($number)
// {
//     $tv2->chanel = $number;
// }




$tv1->sellTo('Petras');

$tv1->gabalas();
$tv1->ijungti(2);

$tv1->chanel = 5057;
// $tv1->in = 105;

$tv3->sellTo('Valentina');
$tv3->switchCanel(2);
$tv1->switchCanel(2);


_d($tv1, 'TV1');
_d($tv2, 'TV2');
_d($tv3, 'TV3');