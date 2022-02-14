<?php

class transaction{
    private $idtransaction;
    private $datetransaction;
    private $idutilisateur;
    
    public function __construct($unidtransaction, $unedatetransaction, $unidutilisateur) {
        $this->idtransaction=$unidtransaction;
        $this->datetransaction=$unedatetransaction;
        $this->idutilisateur=$unidutilisateur;   
    }
    
    public function getidtransaction()
    {
        return $this->idtransaction;
    }

    public function getdatetransaction()
    {
        return $this->datetransaction;
    }

    public function getcertificat()
    {
        return $this->certificat;
    }

    public function getidutilisateur()
    {
        return $this->idutilisateur;
    }
}

