<?php ob_start();
require_once "Repas.class.php";
$r1 = new Repas(1, "Pates", 100, "pates.jpg");
$r2 = new Repas(2, "Poulet", 200, "poulet.jpg");
$r3 = new Repas(3, "Poisson", 300, "poisson.jpg");
$repass = [$r1, $r2, $r3];

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
                <th scope="row"><img src="public/img/<?= $repass[$i]->getImage() ?>" width="60px" /> </th>
                <td><?= $repass[$i]->getNom() ?></td>
                <td><?= $repass[$i]->getStock() ?></td>
                <td>
                    <a href="" class="btn btn-warning">Modifier</a>
                    <a href="" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php $content = ob_get_clean();
$titre = "Page Repas";
require "template.php"; ?>