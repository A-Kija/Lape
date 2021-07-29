<?php
$masyvas = [];
foreach(range(1, 30) as $_) {
    $masyvas[] = rand(5, 25);
}

$max = [];
$maxVal = PHP_INT_MIN;
foreach($masyvas as $key => $val) {
    if ($val > $maxVal) {
        $max = [];
        $maxVal = $val;
    }
    if ($val == $maxVal) {
        $max[] = $key;
    }
}

echo '<pre>';
print_r($masyvas);
// print_r($max);

foreach(range(1, 10) as $_) {
    $masyvas[] = rand(5, 25);
}

print_r($masyvas);

$porinis = [];
$neporinis = [];
foreach ($masyvas as $key => $val) {
    $key % 2 ? $neporinis[] = $val : $porinis[] = $val;
}
print_r($porinis);
print_r($neporinis);

foreach ($masyvas as $key => $val) {
    if ($key % 2 === 0 && $val > 15) {
        $masyvas[$key] = 0;
    }
}

print_r($masyvas);
$indeksas = 0;
foreach ($masyvas as $key => $val) {
    if ($val > 10) {
        $indeksas = $key;
        break;
    }
}
echo $indeksas;

foreach ($masyvas as $key => $val) {
    if ($key % 2 === 0) {
        unset($masyvas[$key]);
    }
}
print_r($masyvas);





