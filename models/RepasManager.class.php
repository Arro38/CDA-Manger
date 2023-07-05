<?php
require_once "Model.class.php";
require_once "Repas.class.php";
class RepasManager extends Model
{
    private $repass;

    public function ajoutRepas($repas)
    {
        $this->repass[] = $repas;
    }

    public function getRepass()
    {
        return $this->repass;
    }

    public function chargementRepas()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM repas");
        $req->execute();
        $mesRepas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach ($mesRepas as $repas) {
            $r = new Repas($repas['id'], $repas['nom'], $repas['stock'], $repas['image']);
            $this->ajoutRepas($r);
        }
    }

    public function getRepasById($id)
    {
        for ($i = 0; $i < count($this->repass); $i++) {
            if ($this->repass[$i]->getId() === $id) {
                return $this->repass[$i];
            }
        }
    }
}
