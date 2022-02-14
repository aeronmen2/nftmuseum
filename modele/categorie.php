<?php

class categorie{
    private $idcategorie;
    private $libellecategorie;
    
    public function __construct($unidcategorie, $unlibellecategorie) {
        $this->idcategorie=$unidcategorie;
        $this->libellecategorie=$unlibellecategorie;   
    }
    
    public function getidcategorie()
    {
        return $this->idcategorie;
    }

    public function getlibellecategorie()
    {
        return $this->libellecategorie;
    }

}

