<?php

include_once('connexionDAO.php');
include_once('avis.php');
include_once('oeuvre.php');

//récupérer tout les avis
class avisDAO{
    public static function getAvisDAO(){
        $res = array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from avis");
        $request->execute();
        $ligne=$request->fetchAll();
        foreach($ligne as $key => $value){
            $collectionavis = new avis($value['idutilisateur'],$value['idoeuvre'],$value['commentaire']);
            $res[]=$collectionavis;
        }
         return $res;
    }

        public static function getAvisListeDAO($idutilisateur){
            $res = array();
            $connect = connexionDAO::connexionPDO();
            $request = $connect->prepare("select * from avis where idutilisateur = :idutilisateur");
            $request->bindValue(':idartiste', $idutilisateur, PDO::PARAM_INT);
            $request->execute();
            $ligne=$request->fetchAll();
            foreach($ligne as $key => $value){
                $collectionavis2 = new avis($value['idutilisateur'],$value['idoeuvre'],$value['commentaire']);
                $res[]=$collectionavis2;
            }
             return $res;
        }

    //récupérer avis d'un utilisateur
    public static function getUnAvisDAO($idutilisateur)
    {
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from avis where idutilisateur = :idutilisateur");
        $request->bindValue(':idartiste', $idutilisateur, PDO::PARAM_INT);
        $request->execute();
        
        $ligne=$request->fetch(PDO::FETCH_ASSOC);
        if($ligne){
            $unavis = new avis($ligne['idutilisateur'],$ligne['idoeuvre'],$ligne['commentaire']);
            return $unavis;
        }
    }

//ajouter un avis
    public static function addUnAvisDAO($idartiste, $idoeuvre, $commentaire )
    {
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("insert into avis (idartiste, idoeuvre, commentaire) values (:idartiste, :idoeuvre, :commentaire)");
        $request->bindValue(':idartiste', $idartiste, PDO::PARAM_INT);
        $request->bindValue(':idoeuvre', $idoeuvre, PDO::PARAM_INT);
        $request->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);

        $res=$request->execute();
        return $res;
    }

//supprimer un avis
    public static function suppUnAvisDAO($idartiste, $idoeuvre)
    { $res = -1;
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("delete * from artiste where idartiste = :idartiste and idoeuvre = :idoeuvre");
        $request->bindValue(':idartiste', $idartiste, PDO::PARAM_INT);
        $request->bindValue(':idoeuvre', $idoeuvre, PDO::PARAM_INT);
        $res=$request->execute();
        return $res;
    }
}