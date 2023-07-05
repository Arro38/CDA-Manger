<?php
class Repas
{
    private $id;
    private $nom;
    private $stock;
    private $image;

    public function __construct($id, $nom, $stock, $image)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->stock = $stock;
        $this->image = $image;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getStock()
    {
        return $this->stock;
    }
    public function setStock($stock)
    {
        $this->stock = $stock;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
}
