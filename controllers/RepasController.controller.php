<?php
require_once "models/RepasManager.class.php";
class RepasController
{
    private $repasManager;
    public function __construct()
    {
        $this->repasManager = new RepasManager;
        $this->repasManager->chargementRepas();
    }
    public function afficherRepas()
    {
        $repass = $this->repasManager->getRepass();
        require "views/repas.views.php";
    }

    public function afficherUnRepas($id)
    {
        $repas = $this->repasManager->getRepasById($id);
        require "views/unRepas.views.php";
    }
    public function supprimerRepas($id)
    {
        $this->repasManager->suppressionRepasBD($id);
        header('Location: ' . URL . "repas");
    }

    public function ajoutRepas()
    {
        require "views/ajoutRepas.view.php";
    }

    public function ajoutRepasValidation()
    {
        $file = $_FILES['image'];
        $repertoire = "public/img/";
        $nomImageAjoute = $this->ajoutImage($file, $repertoire);
        $this->repasManager->ajoutRepasBd($_POST['nom'], $_POST['stock'], $nomImageAjoute);
        header('Location: ' . URL . "repas");
    }

    public function modificationRepasValidation($id)
    {
        $imageActuelle = $this->repasManager->getRepasById($id)->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {
            unlink("public/img/" . $imageActuelle);
            $repertoire = "public/img/";
            $nomImageToAdd = $this->ajoutImage($file, $repertoire);
        } else {
            $nomImageToAdd = $imageActuelle;
        }
        $this->repasManager->modificationRepasBD($id, $_POST['nom'], $_POST['stock'], $nomImageToAdd);
        header('Location: ' . URL . "repas");
    }

    private function ajoutImage($file, $dir)
    {
        if (!isset($file['name']) || empty($file['name'])) throw new Exception("Vous devez indiquer une image");
        if (!file_exists($dir)) mkdir($dir, 0777);
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random = rand(0, 99999);
        $target_file = $dir . $random . "_" . $file['name'];
        if (!getimagesize($file["tmp_name"])) throw new Exception("Le fichier n'est pas une image");
        if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif") throw new Exception("L'extension du fichier n'est pas reconnu");
        if (file_exists($target_file)) throw new Exception("Le fichier existe déjà");
        if ($file['size'] > 500000) throw new Exception("Le fichier est trop gros");
        if (!move_uploaded_file($file['tmp_name'], $target_file)) throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random . "_" . $file['name']);
    }
}
