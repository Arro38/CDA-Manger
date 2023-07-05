<?php
require_once "controllers/RepasController.controller.php";
if (empty($_GET['page'])) {
    require "views/accueil.views.php";
} else {
    switch ($_GET['page']) {
        case "accueil":
            require "views/accueil.views.php";
            break;
        case "repas":
            $repasController = new RepasController();
            $repasController->afficherRepas();
            break;
    }
}
