<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Bebrų Užtvanka</title>
    <style>
    label {
        display: inline-block;
        width: 140px;
    }
    nav {
        background: gray;
        margin: 10px 5px;
        padding: 5px;
    }
    nav a.btn {
        display: inline-block;
        margin: 4px;
        font-size: 26px;
        text-decoration: none;
        color: black;
    }
    nav a.btn:hover {
        color: black;
    }
    .uztvanka {
        border: 2px solid black;
    }
    .uztvanka h1 {
        margin: 5px 5px 5px 0;
        padding: 7px 7px 7px 0;
        font-size: 22px;
    }

    .login-form {
        margin: 5px;
        padding: 17px;
        border: 1px solid #ccc;
    }

    .logout-form {
        display: inline-block;
    }

    .logout-form button {
        margin: 4px;
        font-size: 26px;
        text-decoration: none;
        color: black;
    }

    .logout-form button:hover {
        color: black;
    }
    .form-bebrai {
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    .form-bebrai button {
        margin-left: 4px;
        min-width: 38px;
        text-align: center;
    }



    </style>
</head>

<body>
<nav>
    <a class="btn btn-link" href="<?= URL ?>">Pradžia</a>
    <a class="btn btn-link" href="<?= URL ?>create">Nauja Užtvanka</a>
    <a class="btn btn-link" href="<?= URL ?>list">Sąrašas</a>

    <a class="btn btn-link" href="<?= URL ?>login">Prisijungti</a>

</nav>

