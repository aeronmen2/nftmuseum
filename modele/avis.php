<?php

class avis{
    private $idutilisateur;
    private $idoeuvre;
    private $commentaire;
    
    public function __construct($unidutilisateur, $uneoeuvre, $uncommentaire) {
        $this->idutilisateur=$unidutilisateur;
        $this->idoeuvre=$uneoeuvre;
        $this->commentaire=$uncommentaire;   
    }
    
    public function getidutilisateur()
    {
        return $this->idutilisateur;
    }

    public function getidoeuvre()
    {
        return $this->idoeuvre;
    }

    public function getcommentaire()
    {
        return $this->commentaire;
    }
}

