<?php

include_once('connexionDAO.php');
include_once('oeuvre.php');

class oeuvreDAO{

//récupérer toutes les oeuvres
    public static function getOeuvresDAO(){
        $res = array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from oeuvre");
        $request->execute();
        $ligne=$request->fetchAll();
        foreach($ligne as $key => $value){
            $collectionoeuvre = new oeuvre($value['idoeuvre'],$value['nomoeuvre'],$value['imageoeuvre'],$value['prixdigital'],$value['idartiste'],$value['idmusee'],$value['idcategorie'],$value['idtransaction']);
            $res[]=$collectionoeuvre;
        }
         return $res;
    }

//récupérer les oeuvres par rapport à leur nom (fonction recherche)
    public static function getOeuvreByNomDAO($nomoeuvre)
    {
        $res = array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from oeuvre where nomoeuvre like :nomoeuvre");
        $request->bindValue(':nomoeuvre', "%".$nomoeuvre."%", PDO::PARAM_STR);
        $request->execute();
        $ligne=$request->fetchAll();
        foreach($ligne as $key => $value){
            $collectionoeuvrenom = new oeuvre($value['idoeuvre'],$value['nomoeuvre'],$value['imageoeuvre'],$value['prixdigital'],$value['idartiste'],$value['idmusee'],$value['idcategorie'],$value['idtransaction']);
            $res[]=$collectionoeuvrenom;
        }
         return $res;
    }

//récupérer une oeuvre par rapport à son id
    public static function getUneOeuvreDAO($idoeuvre)
    {
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from oeuvre where idoeuvre = :idoeuvre");
        $request->bindValue(':idoeuvre', $idoeuvre, PDO::PARAM_INT);
        $request->execute();
        
        $ligne=$request->fetch(PDO::FETCH_ASSOC);
        if($ligne){
            $uneoeuvre = new oeuvre($ligne['idoeuvre'],$ligne['nomoeuvre'],$ligne['imageoeuvre'],$ligne['prixdigital'],$ligne['idartiste'],$ligne['idmusee'],$ligne['idcategorie'],$ligne['idtransaction']);
            return $uneoeuvre;
        }
    }

//récupérer artiste d'une oeuvre
    public static function getArtisteOeuvreDAO($idoeuvre)
    {
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select artiste.idartiste, nomartiste, datenaissanceartiste, paysnaissanceartiste from artiste,oeuvre where artiste.idartiste = oeuvre.idartiste and idoeuvre = :idoeuvre");
        $request->bindValue(':idoeuvre', $idoeuvre, PDO::PARAM_INT);
        $request->execute();
        
        $ligne=$request->fetch(PDO::FETCH_ASSOC);
        if($ligne){
            $unartiste = new artiste($ligne['idartiste'],$ligne['nomartiste'],$ligne['anneenaissanceartiste'],$ligne['paysnaissanceartist']);
            return $unartiste;
        }
    }


//récupérer musée d'une oeuvre
    public static function getMuseeOeuvreDAO($idoeuvre)
    {
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select musee.idmusee, nommusee, adressemusee, villemusee, paysmusee from musee,oeuvre where musee.idmusee = oeuvre.idmusee and idoeuvre = :idoeuvre");
        $request->bindValue(':idoeuvre', $idoeuvre, PDO::PARAM_INT);
        $request->execute();
        
        $ligne=$request->fetch(PDO::FETCH_ASSOC);
        if($ligne){
            $unmusee = new musee($ligne['idmusee'],$ligne['nommusee'],$ligne['adressemusee'],$ligne['villemusee'],$ligne['imagemusee']);
            return $unmusee;
        }
    }

//ajouter une oeuvre
    public static function addOeuvreDAO($idoeuvre, $nomoeuvre, $imageoeuvre, $prixdigital, $idartiste, $idmusee, $idcategorie, $idtransaction)
    { $res = -1;

        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("insert into oeuvre (idoeuvre, nomoeuvre, imageoeuvre, prixdigital, idartiste, idmusee, idcategorie, idtransaction) values (:idoeuvre, :nomoeuvre, :imageoeuvre, :prixdigital, :idartiste, :idmusee, :idcategorie, :idtransaction)");
        $request->bindValue(':idoeuvre', $idoeuvre, PDO::PARAM_INT);
        $request->bindValue(':nomoeuvre', $nomoeuvre, PDO::PARAM_STR);
        $request->bindValue(':imageoeuvre', $imageoeuvre, PDO::PARAM_STR);
        $request->bindValue(':prixdigital', $prixdigital, PDO::PARAM_STR);
        $request->bindValue(':idmusee', $idmusee, PDO::PARAM_STR);
        $request->bindValue(':idcategorie', $idcategorie, PDO::PARAM_STR);
        $request->bindValue(':idtransaction', $idtransaction, PDO::PARAM_STR);

        $res=$request->execute();
        return $res;
    }

//supprimer une oeuvre
    public static function suppUneOeuvreDAO($idoeuvre)
    { $res = -1;
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("delete * from oeuvre where idoeuvre = :idoeuvre");
        $request->bindValue(':idoeuvre', $idoeuvre, PDO::PARAM_INT);
        $res=$request->execute();
        return $res;
    }

}
