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

    public function suppressionRepasBD($id)
    {
        $req = "
        Delete from repas where id = :idRepas
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idRepas", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $repas = $this->getRepasById($id);
            unset($repas);
        }
    }

    public function ajoutRepasBd($nom, $stock, $image)
    {
        $req = " INSERT INTO repas (nom, stock, image) values (:nom, :stock, :image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":stock", $stock, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $repas = new Repas($this->getBdd()->lastInsertId(), $nom, $stock, $image);
            $this->ajoutRepas($repas);
        }
    }

    public function modificationRepasBD($id, $nom, $stock, $image)
    {
        $req = "
        update repas 
        set nom = :nom, stock = :stock, image = :image
        where id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":stock", $stock, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
    }
}
