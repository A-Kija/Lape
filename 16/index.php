<?php


require __DIR__ .'/TV.php';


$tv1 = new TV(42, 88);
$tv2 = new TV(42);
$tv3 = new TV(55);


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

$tv1->chanel = 5057;
// $tv1->in = 105;

$tv3->sellTo('Valentina');
$tv3->switchCanel(2);


_d($tv1, 'TV1');
_d($tv2, 'TV2');
_d($tv3, 'TV3');