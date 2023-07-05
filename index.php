<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once "controllers/RepasController.controller.php";
if (empty($_GET['page'])) {
    require "views/accueil.views.php";
} else {
    // $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
    $url = explode("/", $_GET['page']);
    switch ($url[0]) {
        case "accueil":
            require "views/accueil.views.php";
            break;
        case "repas":
            // $url = ["repas","voir","2"]
            // $url[0] = "accueil" , "repas"
            // $url[1] = "voir" , "ajouter", "supprimer"
            // $url[2] = id du repas
            $repasController = new RepasController();
            if (empty($url[1])) {
                $repasController->afficherRepas();
            } else if ($url[1] === "voir") {
                $repasController->afficherUnRepas($url[2]);
            } else if ($url[1] === "ajouter") {
                $repasController->ajoutRepas();
            } else if ($url[1] === "ajoutValidation") {
                $repasController->ajoutRepasValidation();
            } else if ($url[1] === "modifier") {
                echo "modifier un repas";
            } else if ($url[1] === "supprimer") {
                echo "supprimer un repas" . $url[2];
            }
            break;
    }
}
