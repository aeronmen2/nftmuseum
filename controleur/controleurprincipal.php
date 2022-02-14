<?php

//permet de redigerer grâce au controleur

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "listeoeuvre.php";
    $lesActions["listeoeuvre"] = "listeoeuvre.php";
    $lesActions["listeartistes"] = "listeartistes.php";
    $lesActions["detailoeuvre"] = "detailoeuvre.php";
    $lesActions["detailartistes"] = "detailartistes.php";
    $lesActions["detailmusee"] = "detailmusee.php";
    $lesActions["contact"] = "contact.php";
    $lesActions["rechercher"] = "rechercher.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["resultatrecherche"] = "rechercher.php";
    $lesActions["monprofil"] = "monprofil.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["acheter"] = "acheter.php";


    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>