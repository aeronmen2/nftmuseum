<?php

class musee{
    private $idmusee;
    private $nommusee;
    private $adressemusee;
    private $villemusee;
    private $paysmusee;
    
    public function __construct($unidmusee, $unnommusee, $uneadressemusee, $unevillemusee, $unpaysmusee) {
        $this->idmusee=$unidmusee;
        $this->nommusee=$unnommusee;
        $this->adressemusee=$uneadressemusee;
        $this->villemusee=$unevillemusee;
        $this->paysmusee=$unpaysmusee;     
    }
    
    public function getidmusee()
    {
        return $this->idmusee;
    }

    public function getnommusee()
    {
        return $this->nommusee;
    }

    public function getadressemusee()
    {
        return $this->adressemusee;
    }

    public function getvillemusee()
    {
        return $this->villemusee;
    }

    public function getpays()
    {
        return $this->paysmusee;
    }
}

