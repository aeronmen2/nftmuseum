<?php

include_once('connexionDAO.php');
include_once('artiste.php');

//récupérer tableau de tout les artistes
class artisteDAO{
    
    public static function getArtistesDAO(){
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from artiste");
        $request->execute();
        $ligne=$request->fetchAll();
        foreach($ligne as $key => $value){
            $collectionartistes = new artiste($value['idartiste'],$value['nomartiste'],$value['datenaissanceartiste'],$value['paysnaissanceartiste']);
            $res[]=$collectionartistes;
        }
         return $res;
    }

//récupérer un artiste selon son id
    public static function getUnArtisteDAO($idartiste)
    {
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from artiste where idartiste = :idartiste");
        $request->bindValue(':idartiste', $idartiste, PDO::PARAM_INT);
        $request->execute();
        
        $ligne=$request->fetch(PDO::FETCH_ASSOC);
        if($ligne){
            $unartiste = new artiste($ligne['idartiste'],$ligne['nomartiste'],$ligne['datenaissanceartiste'],$ligne['paysnaissanceartiste']);
            return $unartiste;
        }
    }

    //ajouter un artiste
    public static function addUnArtisteDAO($idartiste, $nomartiste, $datenaissanceartiste, $paysnaissanceartiste)
    { $res = -1;

        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("insert into artiste (idartiste, nomartiste, datenaissanceartiste, paysnaissanceatriste) values (:idartiste, :nomartiste, :datenaissanceartiste, :paysnaissanceartiste)");
        $request->bindValue(':idartiste', $idartiste, PDO::PARAM_INT);
        $request->bindValue(':nomartiste', $nomartiste, PDO::PARAM_STR);
        $request->bindValue(':datnaissanceartiste', $datenaissanceartiste, PDO::PARAM_STR);
        $request->bindValue(':paysnaissanceartiste', $paysnaissanceartiste, PDO::PARAM_STR);

        $res=$request->execute();
        return $res;
    }

//supprimer un artiste
    public static function suppUnArtisteDAO($idartiste)
    { $res = -1;
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("delete * from artiste where idartiste = :idartiste");
        $request->bindValue(':idartiste', $idartiste, PDO::PARAM_INT);
        $res=$request->execute();
        return $res;
    }
}
