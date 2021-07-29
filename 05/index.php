<?php


$masyvas = [];


echo '<pre>';



// $masyvas['kojines'] = 7;
$masyvas[true] = 88;
$masyvas[1] = 44;
$masyvas[555] = 99;
$masyvas['belekas'] = 99;
// $masyvas[1] = 555;
$masyvas[] = 'tatata';
array_push($masyvas, 'blabla');


$masyvas1 = [77 => 4, 'uu' => 5, 'labas'];
$colors2 = [];
$colors = ['red', 'i' =>'green', 'blue', 'yellow'];

foreach ($colors as $kasNori2 => &$kasNori) {}

unset($kasNori);

foreach ($colors as $kasNori2 => $kasNori) {
   echo 'Reikšmė: ' . $kasNori . '<br>';
//    echo 'Stalcius: ' . $kasNori2 . '<br>';

//    $colors[$kasNori2] = 'black';
//    unset($colors[$kasNori2]);

}





// print_r($colors);


$A = 8;
// $B = $A; // pagal reiksme by value
$B = &$A; // pagal nuoroda by referrence
$C = &$B;

$A = 10;

$B = 22;

$C = 'labas';


echo "A = $A B = $B C = $C";



// for ($i = 1; $i <= 5; $i++) {
//     echo "<br>Skaicius yra $i";
// }

// foreach(range(8, 12) as &$i) {
//     echo "<br>Skaicius yra $i";
// }

// echo $i = 78;

print_r($colors);  
asort($colors);

// usort($colors, fn($a, $b) => $b <=> $a);

print_r($colors);   

