<?php
function getBebrai() : array
{
    if (!file_exists(__DIR__.'/bebrai.json')) {
        $bebrai = ['juodieji' => 0, 'rudieji' => 0];
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

function router()
{
    $route = $_GET['route'] ?? '';
    if ('GET' == $_SERVER['REQUEST_METHOD'] && '' === $route) {
        pirmasPuslapis();
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'prideti-juodus' == $route) {
        pridetiJuodus();
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'atimti-juodus' == $route) {
        atimtiJuodus();
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'prideti-rudus' == $route) {
        pridetiRudus();
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'atimti-rudus' == $route) {
        atimtiRudus();
    }
    else {
        echo 'Page not found 404';
        die;
    }
}

function pridetiJuodus()
{
    $bebrai = getBebrai();
    $bebrai['juodieji'] += (int)$_POST['j_plus'];
    setBebrai($bebrai);
    header('Location: http://localhost/Lape/12/BebruUztvanka.php');
}
function atimtiJuodus()
{
    $bebrai = getBebrai();
    $bebrai['juodieji'] -= (int)$_POST['j_minus'];
    setBebrai($bebrai);
    header('Location: http://localhost/Lape/12/BebruUztvanka.php');
}
function pridetiRudus()
{
    $bebrai = getBebrai();
    $bebrai['rudieji'] += (int)$_POST['r_plus'];
    setBebrai($bebrai);
    header('Location: http://localhost/Lape/12/BebruUztvanka.php');
}
function atimtiRudus()
{
    $bebrai = getBebrai();
    $bebrai['rudieji'] -= (int)$_POST['r_minus'];
    setBebrai($bebrai);
    header('Location: http://localhost/Lape/12/BebruUztvanka.php');
}

function pirmasPuslapis()
{
    require __DIR__ . '/view/pirmas.php';
}
