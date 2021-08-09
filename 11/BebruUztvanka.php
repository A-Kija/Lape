<?php

require __DIR__.'/functions.php';


if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $bebrai = getBebrai();
    if ('prideti-juodus' == $_POST['ka_daryti']) {
        $bebrai['juodieji'] += (int)$_POST['j_plus'];
    }
    elseif ('atimti-juodus' == $_POST['ka_daryti']) {
        $bebrai['juodieji'] -= (int)$_POST['j_minus'];
    }
    elseif ('prideti-rudus' == $_POST['ka_daryti']) {
        $bebrai['rudieji'] += (int)$_POST['r_plus'];
    }
    elseif ('atimti-rudus' == $_POST['ka_daryti']) {
        $bebrai['rudieji'] -= (int)$_POST['r_minus'];
    }
    setBebrai($bebrai);
    header('Location: http://localhost/Lape/11/BebruUztvanka.php');
    die;
}

if ('GET' == $_SERVER['REQUEST_METHOD']) :
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebrų Užtvanka</title>
    <style>
    div, h2 {
        margin: 15px;
        padding: 7px;
        border: 1px solid #ccc;
    }
    label {
        display: inline-block;
        width: 140px;
    }
    </style>
</head>
<body>
    <h2>Juodieji: <?= getBebrai()['juodieji'] ?></h2>
    <h2>Rudieji: <?= getBebrai()['rudieji'] ?></h2>
    <form action="http://localhost/Lape/11/BebruUztvanka.php" method="post">
    
    <div>
    <label>Pridėti juodus: </label><input type="text" name="j_plus">
    <button type="submit" name="ka_daryti" value="prideti-juodus">+</button>
    </div>

    <div>
    <label>Atimti juodus: </label><input type="text" name="j_minus">
    <button type="submit" name="ka_daryti" value="atimti-juodus">-</button>
    </div>

    <div>
    <label>Pridėti rudus: </label><input type="text" name="r_plus">
    <button type="submit" name="ka_daryti" value="prideti-rudus">+</button>
    </div>

    <div>
    <label>Atimti rudus: </label><input type="text" name="r_minus">
    <button type="submit" name="ka_daryti" value="atimti-rudus">-</button>
    </div>
    
    
    </form>
</body>
</html>
<?php endif;