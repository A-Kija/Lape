<?php

require __DIR__ . '/Kibiras.php';
require __DIR__ . '/vendor/autoload.php';


$k1 = Kibiras::getKibiras();
$k2 = Kibiras::getKibiras();
$k3 = Kibiras::getKibiras();
// $k3 = clone($k1);
// $k3 = unserialize(serialize($k1));

$k1->prideti1Akmeni();
$k2->prideti1Akmeni();
$k3(15);

$k1->kiekPririnktaAkmenu();
$k2->kiekPririnktaAkmenu();
$k3->kiekPririnktaAkmenu();


// _d($k3('Labas'));
