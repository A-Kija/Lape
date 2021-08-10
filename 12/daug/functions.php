<?php
function getBebrai() : array
{
    if (!file_exists(__DIR__.'/bebrai.json')) {
        $bebrai = [];
        $bebrai = json_encode($bebrai);
        file_put_contents(__DIR__.'/bebrai.json', $bebrai);
    }
    return json_decode(file_get_contents(__DIR__.'/bebrai.json'), 1);
}

function setBebrai(array $bebrai) : void
{
    $bebrai = json_encode($bebrai);
    file_put_contents(__DIR__.'/bebrai.json', $bebrai);
}

function setNauja() : void
{
    $bebrai = json_decode(file_get_contents(__DIR__.'/bebrai.json'), 1);
    $nr = rand(1000000000, 9999999999); // netikras unikalus skaicius
    $nauja = ['juodieji' => 0, 'rudieji' => 0, 'id' => $nr];
    $bebrai[] = $nauja;
    $bebrai = json_encode($bebrai);
    file_put_contents(__DIR__.'/bebrai.json', $bebrai);
}

function router()
{
    $route = $_GET['route'] ?? '';
    if ('GET' == $_SERVER['REQUEST_METHOD'] && '' === $route) {
        pirmasPuslapis();
    }
    elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
        rodytiNaujaPuslapi();
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
        sukurtiNaujaUžtvanka();
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'sugriauti' == $route && isset($_GET['id'])) {
        sugriautiUžtvanka($_GET['id']);
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'prideti-juodus' == $route && isset($_GET['id'])) {
        pridetiJuodus($_GET['id']);
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'atimti-juodus' == $route && isset($_GET['id'])) {
        atimtiJuodus($_GET['id']);
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'prideti-rudus' == $route && isset($_GET['id'])) {
        pridetiRudus($_GET['id']);
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'atimti-rudus' == $route && isset($_GET['id'])) {
        atimtiRudus($_GET['id']);
    }
    else {
        echo 'Page not found 404';
        die;
    }
}


function pridetiJuodus(int $id)
{
    $bebrai = getBebrai();
    foreach ($bebrai as &$bebras) {
        if ($id == $bebras['id']) {
            $bebras['juodieji'] += (int)$_POST['j_plus'];
            break;
        }
    }
    setBebrai($bebrai);
    header('Location: '.URL);
}
function atimtiJuodus(int $id)
{
    $bebrai = getBebrai();
    foreach ($bebrai as &$bebras) {
        if ($id == $bebras['id']) {
            $bebras['juodieji'] -= (int)$_POST['j_minus'];
            break;
        }
    }
    setBebrai($bebrai);
    header('Location: '.URL);
}
function pridetiRudus(int $id)
{
    $bebrai = getBebrai();
    foreach ($bebrai as &$bebras) {
        if ($id == $bebras['id']) {
            $bebras['rudieji'] += (int)$_POST['r_plus'];
            break;
        }
    }
    setBebrai($bebrai);
    header('Location: '.URL);
}
function atimtiRudus(int $id)
{
    $bebrai = getBebrai();
    foreach ($bebrai as &$bebras) {
        if ($id == $bebras['id']) {
            $bebras['rudieji'] -= (int)$_POST['r_minus'];
            break;
        }
    }
    setBebrai($bebrai);
    header('Location: '.URL);
}

function pirmasPuslapis()
{
    $bebrai = getBebrai();
    require __DIR__ . '/view/pirmas.php';
}

function rodytiNaujaPuslapi()
{
    require __DIR__ . '/view/naujas.php';
}

function sukurtiNaujaUžtvanka()
{
    setNauja();
    header('Location: '.URL);
}

function sugriautiUžtvanka(int $id)
{
    $bebrai = getBebrai();
    foreach ($bebrai as $index => $bebras) {
        if ($id == $bebras['id']) {
            unset($bebrai[$index]);
            break;
        }
    }
    setBebrai($bebrai);
    header('Location: '.URL);
}


