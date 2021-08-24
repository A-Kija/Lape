<?php require __DIR__ . '/virsus.php' ?>

<div class="container">
    <div class="row">
        <div class="col-12">
        <ul class="list-group">
<?php foreach ($bebrai as $bebras) : ?>
<li class="uztvanka list-group-item">
<h1>Užtvanka Nr. <?= $bebras['id'] ?></h1>
<form action="<?= URL ?>delete/<?= $bebras['id'] ?>" method="post">
    <button type="submit" class="btn btn-danger">Sugriauti</button>
</form>
<h2>Juodieji: <?= $bebras['juodieji'] ?></h2>
<h2>Rudieji: <?= $bebras['rudieji'] ?></h2>
<form class="m-2" action="<?= URL ?>add-black/<?= $bebras['id'] ?>" method="post">
    <div class="form-bebrai">
        <label>Pridėti juodus: </label><input type="text" name="count">
        <button type="submit" class="btn btn-info">+</button>
    </div>
</form>

<form class="m-2" action="<?= URL ?>rem-black/<?= $bebras['id'] ?>" method="post">
<div class="form-bebrai">
        <label>Atimti juodus: </label><input type="text" name="count">
        <button type="submit" class="btn btn-info">-</button>
    </div>
</form>

<form class="m-2" action="<?= URL ?>add-brown/<?= $bebras['id'] ?>" method="post">
<div class="form-bebrai">
        <label>Pridėti rudus: </label><input type="text" name="count">
        <button type="submit" class="btn btn-info">+</button>
    </div>
</form>

<form class="m-2" action="<?= URL ?>rem-black/<?= $bebras['id'] ?>" method="post">
<div class="form-bebrai">
        <label>Atimti rudus: </label><input type="text" name="count">
        <button type="submit" class="btn btn-info">-</button>
    </div>
</form>
</li>

<?php endforeach ?>
</ul>
</div></div></div>
<?php require __DIR__ . '/apacia.php' ?>