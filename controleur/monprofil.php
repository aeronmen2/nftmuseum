<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}


include_once "$racine/modele/utilisateur.php";
include_once "$racine/modele/utilisateurDAO.php";
include_once "$racine/modele/oeuvre.php";
include_once "$racine/modele/oeuvreDAO.php";
include_once "$racine/modele/transaction.php";
include_once "$racine/modele/transactionDAO.php";
include_once "$racine/modele/avis.php";
include_once "$racine/modele/avisDAO.php";

//vérifier si l'utilisateur est cnnecté et de récupére le mail utilisateur
if(utilisateurDAO::isLoggedOn()){
    $mailutilisateur = $_SESSION["mailutilisateur"];

    $listesoeuvres = oeuvreDAO::getOeuvresDAO();
    $listescommentaires = avisDAO::getAvisDAO();

    // traitement si necessaire des donnees recuperee
    // appel du script de vue qui permet de gerer l'affichage des donnees
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vuemonprofil.php";
    include "$racine/vue/pied.html.php";
}
?>