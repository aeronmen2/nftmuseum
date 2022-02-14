<?php

class oeuvre{
    private $idoeuvre;
    private $nomoeuvre;
    private $imageoeuvre;
    private $prixdigital;
    private $idartiste;
    private $idmusee;
	private $idcategorie;
	private $idtransaction;

    
    public function __construct($unidoeuvre, $unnomoeuvre, $uneimageoeuvre, $unprixdigital, $unidartiste, $unidmusee, $unidcategorie, $unidtransaction) {
        $this->idoeuvre=$unidoeuvre;
        $this->nomoeuvre=$unnomoeuvre;
        $this->imageoeuvre=$uneimageoeuvre;
        $this->prixdigital=$unprixdigital;
        $this->idartiste=$unidartiste;   
        $this->idmusee=$unidmusee; 
		$this->idcategorie=$unidcategorie; 
		$this->idtransaction=$unidtransaction;   
    }
    
    public function getidoeuvre()
    {
        return $this->idoeuvre;
    }

    public function getnomoeuvre()
    {
        return $this->nomoeuvre;
    }

    public function getimageoeuvre()
    {
        return $this->imageoeuvre;
    }

    public function getprixdigital()
    {
        return $this->prixdigital;
    }

    public function getidartiste()
    {
        return $this->idartiste;
    }

    public function getidmusee()
    {
        return $this->idmusee;
    }

    public function getidcategorie()
    {
        return $this->idcategorie;
    }
       
    public function getidtransaction()
    {
        return $this->idtransaction;
    }
}
