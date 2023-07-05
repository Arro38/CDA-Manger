<?php ob_start();
?>
<table class="table table-hover text-center align-middle">
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Nom</th>
            <th scope="col">Stock</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($repass); $i++) { ?>
            <tr class="table-dark">
                <th scope="row"><img src="<?= URL ?>public/img/<?= $repass[$i]->getImage() ?>" width="60px" /> </th>
                <td><?= $repass[$i]->getNom() ?></td>
                <td><?= $repass[$i]->getStock() ?></td>
                <td>
                    <a href="<?= URL . "repas/voir/" . $repass[$i]->getId() ?>" class="btn btn-warning">Modifier</a>
                    <a href="<?= URL . "repas/supprimer/" . $repass[$i]->getId() ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<a href="<?= URL . "repas/ajouter/" ?>" class="btn btn-success">Ajouter</a>

<?php $content = ob_get_clean();
$titre = "Page Repas";
require "template.php"; ?>