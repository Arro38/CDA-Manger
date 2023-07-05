<?php ob_start(); ?>
<form method="POST" action="<?= URL ?>repas/ajoutValidation" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-form-label mt-4" for="nom">Nom</label>
        <input type="text" class="form-control" placeholder="Nom" id="nom" name="nom">
    </div>
    <div class="form-group">
        <label class="col-form-label mt-4" for="stock">Stock</label>
        <input type="text" class="form-control" placeholder="Stock" id="stock" name="stock">
    </div>
    <div class="form-group">
        <label for="image" class="form-label mt-4">Image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>

<?php $content = ob_get_clean();
$titre = "Créer un repas";
require "template.php"; ?>