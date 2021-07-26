<?php


// IFU NESTAI

$obuolys = true;
$bananas = true;
$stikline = true;


if ($obuolys) {
    if ($bananas) {
        echo 'Geriu obuoliu ir bananu sultis';
    }
}

echo '<br>';


if ($obuolys && $bananas) {
    echo 'Geriu obuoliu ir bananu sultis';
}

echo '<br>';

if ($stikline) {

    if ($obuolys && $bananas) {
        echo 'Geriu obuoliu ir bananu sultis';
    }
    elseif ($obuolys) {
        echo 'Geriu obuoliu sultis';
    }
    elseif ($bananas) {
        echo 'Geriu bananu sultis';
    }

}

echo '<br>';

if ($stikline && $obuolys && $bananas) {
    echo 'Geriu obuoliu ir bananu sultis';
}
elseif ($stikline && $obuolys) {
    echo 'Geriu obuoliu sultis';
}
elseif ($stikline && $bananas) {
    echo 'Geriu bananu sultis';
}
    

