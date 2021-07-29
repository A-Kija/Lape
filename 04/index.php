<?php


$masyvas = array(); //<==== prieš 15 metų
$masyvas = [];

// 'Star Wars: Episode '.
// str_repeat(' ', rand(0,5)).
// rand(1,9) .
// ' - A New Hope';

$sk = rand(0, 10);
while ($sk < 9) {
   echo $sk . 'cikle <br>';
   $sk = rand(0, 10);
}

echo "Pabaiga $sk" . '<br>';
echo '---------------------------<br>';

do {
    $sk = rand(0, 10);
    echo $sk . 'cikle <br>';
} while ($sk < 9);

echo "Pabaiga $sk" . '<br>';

echo '---------------------------<br>';

for ($x = 1; $x <= 5; $x++) {
    echo 'Numeris: '.$x.' <br>';
}

//Uždavinys Kiek reikės šaukštų suvalgyti visą sriubą?
$sriuba = rand(260, 300); //ml sriubos
$saukstuKiekis = 0;

// Vienas šaukštas pasemia nuo 7 iki 10 ml sriubos


$sriuba = rand(260, 300);
$saukstuKiekis = 0;
do {
    $saukstuKiekis++;
    // $sriuba -= min(rand(7, 10), $sriuba);
    $pasemta = rand(7, 10);
    // $sriuba -= $pasemta > $sriuba ? $sriuba : $pasemta;
    if ($pasemta > $sriuba) {
        $sriuba = $sriuba - $sriuba;
    }
    else {
        $sriuba = $sriuba - $pasemta;
    }

} while ($sriuba > 0);
echo $saukstuKiekis, $sriuba;


//Uždavinys Kiek reikės šakučių suvalgyti visą kepsnį?
$kepsnys = rand(300, 350); //g mėsos(sojos gaminio)
$sakuciuKiekis = 0;
// Viena šaukutė pasmeigia nuo 7 iki 10 g kepsnio










 



