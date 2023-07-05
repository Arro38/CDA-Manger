<?php ob_start(); ?>
<div class="card mb-3">
    <h3 class="card-header"><?= $repas->getNom() ?></h3>
    <img src="/CDA-MANGER/public/img/<?= $repas->getImage() ?>" width="300px" />
    <div class="card-footer text-muted">
        Stock : <?= $repas->getStock() ?>
    </div>
</div>

<?php $content = ob_get_clean();
$titre = $repas->getNom();
require "template.php"; ?>