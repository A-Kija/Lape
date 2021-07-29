<?php

$komoda = [];
foreach(range(1, 10) as $stalcius) {

    foreach(range(1, 10) as $skyrelis) {
    
        $komoda[$stalcius][$skyrelis]= rand(10, 11);

    }
}
echo '<pre>';
// print_r($komoda);


echo '<br>';
// echo $komoda[3] = 'riestainis';


echo '<br>';
print_r($komoda[5][7]);
echo '<br>';

print_r($komoda);

$sk = 0;

foreach ($komoda as $stalcius) {

    foreach ($stalcius as $skyrelis) {

        if ($skyrelis > 10) {
            $sk++;
        }
        // echo '<br>';
        // print_r($skyrelis);
        // echo '<br>';

    }
}

echo '<br>';
print_r($sk);
echo '<br>';






