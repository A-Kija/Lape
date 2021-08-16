<?php
// Petro failas

require __DIR__ . '/Bebras.php';


$bebras1 = new Bebras;
$bebras2 = new Bebras;
$bebras3 = $bebras1;

// _d('labas');    

echo '<pre>';

// var_dump($bebras2);
// var_dump($bebras3);

$bebras1->tailLong = 89;

$bebras1->color ='black';

_d($bebras1->tailLong, 'Uodega cm ----->');

_d($bebras1->color, 'color ----->');

_d($bebras1->who(), 'Kas tu? ----->');




var_dump($bebras1);


