<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebrų Užtvanka</title>
    <style>
    div, h2 {
        margin: 5px;
        padding: 7px;
        border: 1px solid #ccc;
        font-size: 12px;
    }
    label {
        display: inline-block;
        width: 140px;
    }
    nav {
        background: gray;
        margin: 10px 5px;
        padding: 5px;
    }
    nav a {
        display: inline-block;
        margin: 4px;
        font-size: 26px;
        text-decoration: none;
        color: black;
    }
    .uztvanka {
        margin: 5px;
        padding: 7px;
        border: 2px solid black;
    }
    .uztvanka h1 {
        margin: 5px;
        padding: 7px;
        font-size: 22px;
    }
    </style>
</head>

<body>
<nav>
    <a href="<?= URL ?>">Sąrašas</a>
    <a href="<?= URL ?>?route=nauja">Nauja užtvanka</a>
</nav>