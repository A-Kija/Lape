<?php

echo '<pre>';
$m = [];

foreach(range(0, 100) as $val) {
    $m[] = $val % 10 ? 'B' : 'A';
}

// print_r($m);

foreach($m as $key => $val) {
    $mazas = [];
    foreach (range(1, rand(3, 10)) as $_) {
        $mazas[] = $val;
    }
    $m[$key] = $mazas;
}

print_r($m);


foreach ($m as $key => &$val) {
    if (count($val) == 10) {
        continue;
    }
    foreach (range(1, 10 - count($val)) as $_) {
        $val[] = 'C'; 
    }
}


