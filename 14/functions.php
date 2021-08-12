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
        auth();
        pirmasPuslapis();
    }
    elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'home' == $route) {
        rodytiHome();
    }
    elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
        auth();
        rodytiNaujaPuslapi();
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
        auth();
        sukurtiNaujaUžtvanka();
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'sugriauti' == $route && isset($_GET['id'])) {
        auth();
        sugriautiUžtvanka($_GET['id']);
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'prideti-juodus' == $route && isset($_GET['id'])) {
        auth();
        pridetiJuodus($_GET['id']);
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'atimti-juodus' == $route && isset($_GET['id'])) {
        auth();
        atimtiJuodus($_GET['id']);
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'prideti-rudus' == $route && isset($_GET['id'])) {
        auth();
        pridetiRudus($_GET['id']);
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'atimti-rudus' == $route && isset($_GET['id'])) {
        auth();
        atimtiRudus($_GET['id']);
    }
    elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'login' == $route) {
        if (isLogged()) {
            header('Location: '.URL);
            die;
        }
        rodytiLogin();
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'login' == $route) {
        if (isLogged()) {
            header('Location: '.URL);
            die;
        }
        darytiLogin();
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'logout' == $route) {
        auth();
        darytiLogout();
    }
    else {
        echo 'Page not found 404';
        die;
    }
}


function rodytiLogin()
{
    require __DIR__ . '/view/login.php';
}

function rodytiHome()
{
    require __DIR__ . '/view/home.php';
}

function auth()
{
    if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {

        header('Location: '.URL.'?route=login');
        die;
    }
}

function isLogged()
{
    return isset($_SESSION['login']) && $_SESSION['login'] == 1;
}


function darytiLogout()
{
    unset($_SESSION['login'], $_SESSION['name']);
    header('Location: '.URL.'?route=login');
    die;
}

function darytiLogin()
{
    $users = json_decode(file_get_contents(__DIR__.'/users.json'), 1);
    $name = $_POST['name'] ?? '';
    $pass = md5($_POST['pass']) ?? '';

    foreach ($users as $user) {
        if ($user['name'] == $name) {
            if ($user['pass'] == $pass) {
                $_SESSION['login'] = 1;
                $_SESSION['name'] = $name;
                addMessage('success', 'Sėkmingai prisijungta');
                header('Location: '.URL);
                die;
            }
        }
    }
    addMessage('danger', 'Kažkas blogai');
    header('Location: '.URL.'?route=login');
    die;
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
            // Validacija
            if ((int)$_POST['j_minus'] > $bebras['juodieji']) {
                addMessage('danger', 'Tiek bebrų nėra');
                header('Location: '.URL);
                die;
            }
            $bebras['juodieji'] -= (int)$_POST['j_minus'];
            setBebrai($bebrai);
            addMessage('success', 'Bebrai atimti');
            header('Location: '.URL);
            die;
        }
    }
    addMessage('danger', 'Tokios užtvankos nėra');
    header('Location: '.URL);
    die;

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
    addMessage('success', 'Nauja užtvanka sukurta');
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
    addMessage('success', 'Užtvanka sugriauta');
    header('Location: '.URL);
}

// type success|danger

function addMessage(string $type, string $msg) : void
{
    $_SESSION['msg'][] = ['type' => $type, 'msg' => $msg];
}

function clearMessages() : void
{
    $_SESSION['msg'] = [];
}

function showMessages() : void
{
    $messages = $_SESSION['msg'];
    clearMessages();
    require __DIR__ . '/view/msg.php';
}


