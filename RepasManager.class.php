<?php

class RepasManager
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
}
