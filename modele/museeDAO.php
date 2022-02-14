<?php

include_once('connexionDAO.php');
include_once('musee.php');

//récupérer les musées
class museeDAO{
    public static function getMuseesDAO(){
        $res = array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from musee");
        $request->execute();
        $ligne=$request->fetchAll();
        foreach($ligne as $key => $value){
            $collectionmusee = new musee($value['idmusee'],$value['nommusee'],$value['adressemusee'],$value['villemusee'],$value['paysmusee']);
            $res[]=$collectionmusee;
        }
         return $res;
    }

//récupérer un musée par rapport a son id
    public static function getUnMuseeDAO($idmusee)
    {
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from musee where idmusee = :idmusee");
        $request->bindValue(':idmusee', $idmusee, PDO::PARAM_INT);
        $request->execute();
        $ligne=$request->fetch(PDO::FETCH_ASSOC);
        if($ligne){
            $unmusee = new musee($ligne['idmusee'],$ligne['nommusee'],$ligne['adressemusee'],$ligne['villemusee'],$ligne['paysmusee']);
            return $unmusee;
        }
    }

//ajouter un musée 
    public static function addUnMuseeDAO($idmusee, $nommusee, $adressemusee, $villemusee, $paysmusee)
    { $res = -1;

        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("insert into musee (idmusee, nommusee, adressemusee, villemusee, paysmusee) values (:idmusee, :nommusee, :adressemusee, :villemusee, :paysmusee)");
        $request->bindValue(':idmusee', $idmusee, PDO::PARAM_INT);
        $request->bindValue(':nommusee', $nommusee, PDO::PARAM_STR);
        $request->bindValue(':adressemusee',$adressemusee, PDO::PARAM_STR);
        $request->bindValue(':villemusee', $villemusee, PDO::PARAM_STR);
        $request->bindValue(':paysmusee', $paysmusee, PDO::PARAM_STR);

        $res=$request->execute();
        return $res;
    }

//supprimer un musée
    public static function suppUnMuseeDAO($idmusee)
    { $res = -1;
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("delete * from musee where idmusee = :idmusee");
        $request->bindValue(':idmusee', $idmusee, PDO::PARAM_INT);
        $res=$request->execute();
        return $res;
    }
}

