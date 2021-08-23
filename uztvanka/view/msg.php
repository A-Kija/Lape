<?php if(!empty($messages)) : ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php foreach($messages as $message) : ?>
            <div class="alert alert-<?= $message['type'] ?>" role="alert">
                <?= $message['msg'] ?>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?php endif ?>