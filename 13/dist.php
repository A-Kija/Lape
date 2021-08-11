<?php
session_start();
require __DIR__ . '/functions.php';
if ('POST' == $_SERVER['REQUEST_METHOD']) {

    $from = $_POST['from'] ?? '';
    $to = $_POST['to'] ?? '';
    
    request($from, $to);
    

    header('Location: http://localhost/Lape/13/dist.php');
    die;
}

$distance = $_SESSION['dist'] ?? '';
$from = $_SESSION['from'] ?? '';
$to = $_SESSION['to'] ?? '';
$images = $_SESSION['img'] ?? [];
$source = $_SESSION['s'] ?? [];
unset($_SESSION['dist'], $_SESSION['from'], $_SESSION['to'], $_SESSION['img'], $_SESSION['s']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Dist 24</title>
</head>

<body>
    <?php if($distance) : ?>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h1>Distance from <?= $from ?> to <?= $to ?>
                    <span class="badge badge-secondary">
                        <?= $distance ?> km
                    </span>
                </h1>
                <span class="badge badge-info m-2"><?= $source ?></span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $images[0] ?>" class="card-img-top" alt="from">
                    <div class="card-body">
                        <h5 class="card-title"><?= $from ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $images[1] ?>" class="card-img-top" alt="to">
                    <div class="card-body">
                        <h5 class="card-title"><?= $to ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <form action="http://localhost/Lape/13/dist.php" method="post" class="m-4">
                    <div class="form-group">
                        <label>From</label>
                        <input type="text" class="form-control" placeholder="From" name="from">
                        <small class="form-text text-muted">Enter town or city name.</small>
                    </div>
                    <div class="form-group">
                        <label>To</label>
                        <input type="text" class="form-control" placeholder="To" name="to">
                        <small class="form-text text-muted">Enter town or city name.</small>
                    </div>
                    <button type="submit" class="btn btn-warning">Get info</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>