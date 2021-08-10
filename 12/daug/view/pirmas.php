<?php require __DIR__ . '/virsus.php' ?>


<?php foreach ($bebrai as $bebras) : ?>
<div class="uztvanka">
<h1>Užtvanka Nr. <?= $bebras['id'] ?></h1>
<form action="<?= URL ?>?route=sugriauti&id=<?= $bebras['id'] ?>" method="post">
    <button type="submit">Sugriauti</button>
</form>
<h2>Juodieji: <?= $bebras['juodieji'] ?></h2>
<h2>Rudieji: <?= $bebras['rudieji'] ?></h2>
<form action="<?= URL ?>?route=prideti-juodus&id=<?= $bebras['id'] ?>" method="post">
    <div>
        <label>Pridėti juodus: </label><input type="text" name="j_plus">
        <button type="submit">+</button>
    </div>
</form>

<form action="<?= URL ?>?route=atimti-juodus&id=<?= $bebras['id'] ?>" method="post">
    <div>
        <label>Atimti juodus: </label><input type="text" name="j_minus">
        <button type="submit">-</button>
    </div>
</form>

<form action="<?= URL ?>?route=prideti-rudus&id=<?= $bebras['id'] ?>" method="post">
    <div>
        <label>Pridėti rudus: </label><input type="text" name="r_plus">
        <button type="submit">+</button>
    </div>
</form>

<form action="<?= URL ?>?route=atimti-rudus&id=<?= $bebras['id'] ?>" method="post">
    <div>
        <label>Atimti rudus: </label><input type="text" name="r_minus">
        <button type="submit">-</button>
    </div>
</form>
</div>

<?php endforeach ?>
<?php require __DIR__ . '/apacia.php' ?>