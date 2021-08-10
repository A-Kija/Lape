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
    <form action="http://localhost/Lape/12/BebruUztvanka.php?route=prideti-juodus" method="post">
    <div>
    <label>Pridėti juodus: </label><input type="text" name="j_plus">
    <button type="submit">+</button>
    </div>
    </form>

    <form action="http://localhost/Lape/12/BebruUztvanka.php?route=atimti-juodus" method="post">
    <div>
    <label>Atimti juodus: </label><input type="text" name="j_minus">
    <button type="submit">-</button>
    </div>
    </form>

    <form action="http://localhost/Lape/12/BebruUztvanka.php?route=prideti-rudus" method="post">
    <div>
    <label>Pridėti rudus: </label><input type="text" name="r_plus">
    <button type="submit">+</button>
    </div>
    </form>

    <form action="http://localhost/Lape/12/BebruUztvanka.php?route=atimti-rudus" method="post">
    <div>
    <label>Atimti rudus: </label><input type="text" name="r_minus">
    <button type="submit">-</button>
    </div>
    </form>
    
    
    </form>
</body>
</html>