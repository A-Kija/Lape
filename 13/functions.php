<?php

define('VALID_CATCHE', 30);

function request(string $from, string $to) : void
{
    
    $rez = fromCache($from, $to);
    $source = 'Cache';
    if (empty($rez)) {
        $source = 'Server';
        $rez = fromServer($from, $to);
        addCache($rez);
    }
  
    
    $_SESSION['dist'] = $rez[0];
    $_SESSION['from'] = $rez[2];
    $_SESSION['to'] = $rez[3];
    $_SESSION['img'] = $rez[1];
    $_SESSION['s'] = $source;
}


// [$distance, $images, $from, $to, time()]

function clearCache() : void
{
    if (!file_exists(__DIR__.'/dist.json')) {
        $dist = [];
        $dist = json_encode($dist);
        file_put_contents(__DIR__.'/dist.json', $dist);
    }
    $dist = json_decode(file_get_contents(__DIR__.'/dist.json'), 1);
    foreach ($dist as $index => $d) {
        if ($d[4] + VALID_CATCHE < time()) {
            unset($dist[$index]);
        }
    }
    $dist = json_encode($dist);
    file_put_contents(__DIR__.'/dist.json', $dist);
}


function fromCache(string $from, string $to) : array
{
    if (!file_exists(__DIR__.'/dist.json')) {
        $dist = [];
        $dist = json_encode($dist);
        file_put_contents(__DIR__.'/dist.json', $dist);
    }
    $dist = json_decode(file_get_contents(__DIR__.'/dist.json'), 1);

    foreach ($dist as $d) {
        if ($d[2] == $from && $d[3] == $to && $d[4] + VALID_CATCHE > time()) {
            return $d;
        }
    }
    return [];
}

function addCache(array $rez) : void
{
    if (!file_exists(__DIR__.'/dist.json')) {
        $dist = [];
        $dist = json_encode($dist);
        file_put_contents(__DIR__.'/dist.json', $dist);
    }
    $dist = json_decode(file_get_contents(__DIR__.'/dist.json'), 1);
    $dist[] = $rez;
    $dist = json_encode($dist);
    file_put_contents(__DIR__.'/dist.json', $dist);
}



function fromServer(string $from, string $to) : array
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL,'https://www.distance24.org/route.json?stops='.$from.'|'.$to);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $answer = curl_exec($curl);

    curl_close($curl);

    $data = json_decode($answer);
    
    $distance = $data->distance;

    $images = [$data->stops[0]->wikipedia->image, $data->stops[1]->wikipedia->image];

    return [$distance, $images, $from, $to, time()];
}