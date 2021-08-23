<?php require __DIR__ . '/virsus.php' ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">Sukurti naują užtvanką</h5>
                    <form action="<?= URL ?>create" method="post">
                        <div>
                            <button class="btn btn-warning" type="submit">Sukurti</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/apacia.php' ?>