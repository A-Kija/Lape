<?php

$pirmas = 'bla bla';
// $pirmas = "bla bla"; NETEISINGA!!!

$antras = "ku $pirmas kū";


$trecias = "\n\n\n\n\n\n\n labas \n\n\n\n\n\n\n\n galas";

echo $pirmas;

echo '<br>';

echo $antras;

echo '<br>';

echo $trecias;
echo '<br>';echo '<br>';echo '<br>';echo '<br>';


$pirmas = 'vidurinis';
$vidurinis = 'antras';
$antras = 'bla bla';


echo $$$pirmas;

echo '<br>';

echo '<pre>';

print_r([2,2,2,2,2,2,9,2]);
echo '<br>';
var_dump([2,2,2,'2',2,2,9,2]);


$egzaminoRezultatas = rand(1, 10);
// Išvesti rezultatą ir sprendimą ar egzaminas išlaikytas. Mažiausias išlaikymo balas yra 4

if ($egzaminoRezultatas >= 4) {
    echo 'Egzaminas išlaikytas '.$egzaminoRezultatas;
}
else {
    echo 'Egzaminas NEišlaikytas '.$egzaminoRezultatas;
}



$automobilioGreitis = rand(40, 125);
// Išvesti automobilio greitį ir baudos dydį, jeigu greiti didesnis nei 60. Bauda yra viršytas greitis X 5



$dalyvis1 = rand(1, 4);
$dalyvis2 = rand(1, 4);
// Išvesti dalyvių pasirinktus skaičius ir pranešimą "Laimėjo", jeigu dalyvių skaičių suma didesnė nei 6 arba tie skaičiai yra vienodi. Pranešimą "Pralaimėjo" - priešingu atveju 

echo '<br>';echo '<br>';echo '<br>';
$petras = rand(10, 20);
$jonas = rand(5, 25);

if ($petras > $jonas) {
    echo "Laimėjo: <i>Petras</i> $petras : $jonas";
}
elseif ($petras < $jonas) {
    echo "Laimėjo: <i>Jonas</i> $petras : $jonas";
}
else {
    echo "Laimėjo: <i>Niekas</i> $petras : $jonas";
}

$vienas = 23;

$rezYes = 0;
$rezNo = 0;

$rezultatas = 1 == $vienas ? 'Yes' : (2 == $vienas ? 'Hello' : 'No');

echo '<br>';echo '<br>';
echo $rezultatas;

if (1 == $vienas) {
    $rezultatas =  'Yes';
}
elseif (2 == $vienas) {
    $rezultatas =  'Hello';
}
else {
    $rezultatas =  'No';
}


echo '<br>';echo '<br>';
echo $rezultatas;

switch ($vienas) {
    case 1:
        $rezultatas =  'Yes';
        break;
    case 2:
        $rezultatas =  'Hello';
        break;
    default:
        $rezultatas =  'No';
}

$dydis = 'S';
$kurGalimaDeti = '';

switch ($dydis) {
    case 'S':
        $kurGalimaDeti .= 'S ';
    case 'M':
        $kurGalimaDeti .= 'M ';
    case 'L':
        $kurGalimaDeti .= 'L ';
    default:
        $kurGalimaDeti .= 'XL ';
}

echo '<br>';echo '<br>';
echo $kurGalimaDeti;





// echo '<br>';echo '<br>';
// echo $rezultatas;



// (1 == $vienas) ? $rezYes++ : $rezNo++;

// echo '<br>';echo '<br>';
// echo $rezultatas;
// echo '<br>';
// echo "$rezYes : $rezNo";



