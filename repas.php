<?php ob_start() ?>
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
        <tr class="table-dark">
            <th scope="row"><img src="public/img/pates.jpg" width="60px" /> </th>
            <td>Pates</td>
            <td>10</td>
            <td>
                <a href="" class="btn btn-warning">Modifier</a>
                <a href="" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
        <tr class="table-dark">
            <th scope="row"><img src="public/img/poulet.jpg" width="60px" /> </th>
            <td>Poulet</td>
            <td>20</td>
            <td>
                <a href="" class="btn btn-warning">Modifier</a>
                <a href="" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
        <tr class="table-dark">
            <th scope="row"><img src="public/img/poisson.jpg" width="60px" /> </th>
            <td>Poisson</td>
            <td>30</td>
            <td>
                <a href="" class="btn btn-warning">Modifier</a>
                <a href="" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
    </tbody>
</table>
<?php $content = ob_get_clean();
$titre = "Page Repas";
require "template.php"; ?>