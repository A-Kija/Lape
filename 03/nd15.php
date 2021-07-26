<?php

$skaicius1 = rand(0, 2);
$skaicius2 = rand(0, 2);
$skaicius3 = rand(0, 2);
$skaicius4 = rand(0, 2);


$bendrai = $skaicius1.$skaicius2.$skaicius3.$skaicius4;

$nuliai = substr_count($bendrai, '0');
$vienetai = substr_count($bendrai, '1');
$dvejetai = substr_count($bendrai, '2');

echo $bendrai;
echo '<br>';
echo $nuliai.$vienetai.$dvejetai;

$suma = $skaicius1+$skaicius2+$skaicius3+$skaicius4;
$_2 = 0;

if ($skaicius1 == 2) {
    $_2++;
}
if ($skaicius2 == 2) {
    $_2++;
}
if ($skaicius3 == 2) {
    $_2++;
}
if ($skaicius4 == 2) {
    $_2++;
}

$_1 = $suma - ($_2 * 2);

$_0 = 4 - $_1 - $_2;
echo '<br>';
echo $_0.$_1.$_2;


