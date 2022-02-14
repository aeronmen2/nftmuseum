<?php

include_once('connexionDAO.php');
include_once('utilisateur.php');

class utilisateurDAO{

//récupérer utilisateurs
    public static function getUtilisateursDAO(){
        $res = array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from utilisateur");
        $request->execute();
        $ligne=$request->fetchAll();
        foreach($ligne as $key => $value){
            $collectionutilisateurs = new utilisateur($value['idutilisateur'],$value['mdputilisateur'],$value['mailutilisateur'],$value['pseudoutilisateur']);
            $res[]=$collectionutilisateurs;
        }
         return $res;
    }

//récupére utilisateur par rapport à son mail
    public static function getUtilisateurByMailDAO($mailutilisateur)
    {
        $res = array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from utilisateur where mailutilisateur = :mailutilisateur");
        $request->bindValue(':mailutilisateur', $mailutilisateur, PDO::PARAM_STR);
        $request->execute();

        $ligne=$request->fetch(PDO::FETCH_ASSOC);
        $unutilisateur = new utilisateur($ligne['idutilisateur'],$ligne['mdputilisateur'],$ligne['mailutilisateur'],$ligne['pseudoutilisateur']);
        return $unutilisateur;
    }

//ajouter un utilisateur
    public static function addUnUtilisateurDAO($idutilisateur, $mdputilisateur, $mailutilisateur, $pseudoutilisateur)
    { $res = -1;
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("insert into avis (idutilisateur, mdputilisateur, mailutilisateur, pseudoutilisateur) values (:idutilisateur, :mdputilisateur, :mailutilisateur, :pseudoutilisateur)");
        $request->bindValue(':idutilisateur', $idutilisateur, PDO::PARAM_INT);
        $request->bindValue(':mdputilisateur', $mdputilisateur, PDO::PARAM_STR);
        $request->bindValue(':mailutilisateur', $mailutilisateur, PDO::PARAM_STR);
        $request->bindValue(':pseudoutilisateur', $pseudoutilisateur, PDO::PARAM_STR);

        $res=$request->execute();
        return $res;
    }

// connexion
    public static function login($mailutilisateur, $mdputilisateur){
        if (!isset($_SESSION)) {
            session_start();
        }

        $utilisateur = utilisateurDAO::getUtilisateurByMailDAO($mailutilisateur);
        $mdpbd = $utilisateur->getmdputilisateur();

        if (trim($mdpbd) == trim($mdputilisateur)) {
            $_SESSION["mailutilisateur"] = $mailutilisateur;
            $_SESSION["mdputilisateur"] = $mdpbd;
        }
    }

//deconnexion
    public static function logout() {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION["mailutilisateur"]);
        unset($_SESSION["mdputilisateur"]);
    }

//récupérer l'email de l'utilisateur connecté
    public static function getMailULoggedOn(){
        if (utilisateurDAO::isLoggedOn()){
            $ret = $_SESSION["mailutilisateur"];
        }
        else {
            $ret = "";
        }
        return $ret;
            
    }

//voir si un utilisateur est connécter
    public static function isLoggedOn() {
        if (!isset($_SESSION)) {
            session_start();
        }
        $ret = false;
    
        if (isset($_SESSION["mailutilisateur"])) {
            $utilisateur = utilisateurDAO::getUtilisateurByMailDAO($_SESSION["mailutilisateur"]);
            if ($utilisateur->getmailutilisateur() == $_SESSION["mailutilisateur"] && $utilisateur->getmdputilisateur() == $_SESSION["mdputilisateur"]
            ) {
                $ret = true;
            }
        }
        return $ret;
    }
}