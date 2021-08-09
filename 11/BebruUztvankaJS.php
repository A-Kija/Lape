<?php

require __DIR__.'/functions.php';

if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $bebrai = getBebrai();
    $rawData = file_get_contents("php://input");
    $data = json_decode($rawData, 1);

    if ('prideti-juodus' == $data['kaDaryti']) {
        $bebrai['juodieji'] += (int)$data['kiek'];
    }
    elseif ('atimti-juodus' == $data['kaDaryti']) {
        $bebrai['juodieji'] -= (int)$data['kiek'];
    }
    elseif ('prideti-rudus' == $data['kaDaryti']) {
        $bebrai['rudieji'] += (int)$data['kiek'];
    }
    elseif ('atimti-rudus' == $data['kaDaryti']) {
        $bebrai['rudieji'] -= (int)$data['kiek'];
    }
    setBebrai($bebrai);
    header('Content-Type: application/json');
    echo json_encode($bebrai);
}

if ('GET' == $_SERVER['REQUEST_METHOD']) :
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://localhost/Lape/11/bebrai.js" defer></script>
    <script>const postUrl = 'http://localhost/Lape/11/BebruUztvankaJS.php';</script>
    <title>Bebrų Užtvanka JS</title>
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
    <h2>Juodieji: <span id="juodi"><?= getBebrai()['juodieji'] ?></span></h2>
    <h2>Rudieji: <span id="rudi"><?= getBebrai()['rudieji'] ?></span></h2>
    
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
    
</body>
</html>
<?php endif;