 <?php

class artiste{
    private $idArtiste;
    private $nomArtiste;
    private $dateNaissanceArtiste;
    private $paysNaissanceArtiste;
    
    public function __construct($unIdArtiste, $unNomArtiste, $dateNaissance, $paysNaissance) {
        $this->idArtiste=$unIdArtiste;
        $this->nomArtiste=$unNomArtiste;
        $this->dateNaissanceArtiste=$dateNaissance;
        $this->paysNaissanceArtiste=$paysNaissance;   
    }
    
    public function getIDArtiste()
    {
        return $this->idArtiste;
    }

    public function getNomArtiste()
    {
        return $this->nomArtiste;
    }

    public function getDateArtiste()
    {
        return $this->dateNaissanceArtiste;
    }

    public function getPaysArtiste()
    {
        return $this->paysNaissanceArtiste;
    }
}

