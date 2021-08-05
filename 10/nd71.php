<?php
    $c = ($_GET['color'] ?? false) ? 'red' : 'black';
    //
    // $_GET['color'] ?? false  
    // jeigu kintamasis color yra tai grazinam 1 kuris virsta true 
    // tenaris grazina $c = 'red'
    // jeigu kintamojo color nera tai ?? sintakse grazina false tenario salygai
    // tenaris grazina $c = 'black'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ND 71</title>
    <style>
    body {
        background-color: <?= $c ?>; /* php echo ===> = */
    }
    a {
        color: pink;
    }
    </style>
</head>
<body>
    <a href="http://localhost/Lape/10/nd71.php">Be</a>
    <a href="http://localhost/Lape/10/nd71.php?color=1">Su</a>
</body>
</html>




