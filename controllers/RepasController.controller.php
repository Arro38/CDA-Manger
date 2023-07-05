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
}
