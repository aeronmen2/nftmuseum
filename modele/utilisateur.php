<?php

class utilisateur{
    private $idutilisateur;
    private $mdputilisateur;
    private $mailutilisateur;
    private $pseudoutilisateur;
    
    public function __construct($unidutilisateur, $unmdputilisateur, $unmailutilisateur, $unpseudoutilisateur) {
        $this->idutilisateur=$unidutilisateur;
        $this->mdputilisateur=$unmdputilisateur;
        $this->mailutilisateur=$unmailutilisateur;   
        $this->pseudoutilisateur=$unpseudoutilisateur;   
    }
    
    public function getidutilisateur()
    {
        return $this->idutilisateur;
    }

    public function getpseudoutilisateur()
    {
        return $this->pseudoutilisateur;
    }

    public function getmailutilisateur()
    {
        return $this->mailutilisateur;
    }

    public function getmdputilisateur()
    {
        return $this->mdputilisateur;
    }


}
