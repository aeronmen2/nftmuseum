<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/artiste.php";
include_once "$racine/modele/artisteDAO.php";
include_once "$racine/modele/avis.php";
include_once "$racine/modele/avisDAO.php";
include_once "$racine/modele/categorie.php";
include_once "$racine/modele/categorieDAO.php";
include_once "$racine/modele/connexionDAO.php";
include_once "$racine/modele/musee.php";
include_once "$racine/modele/museeDAO.php";
include_once "$racine/modele/oeuvre.php";
include_once "$racine/modele/oeuvreDAO.php";
include_once "$racine/modele/transaction.php";
include_once "$racine/modele/transactionDAO.php";
include_once "$racine/modele/utilisateur.php";
include_once "$racine/modele/utilisateurDAO.php";

// recuperation des donnees GET, POST, et SESSION
// verification si les données ont éte rentrés

if (isset($_POST["mailutilisateur"]) && isset($_POST["mdputilisateur"])){
    $mailutilisateur=$_POST["mailutilisateur"];
    $mdputilisateur=$_POST["mdputilisateur"];
}
else
{
    $mailutilisateur="";
    $mdputilisateur="";
}

// si le mail et le mdp ne sont pas vides nous lancons la connexion

if($mailutilisateur!="" && $mdputilisateur!=""){
    utilisateurDAO::login($mailutilisateur,$mdputilisateur);
}


// appel du script de vue qui permet de gerer l'affichage des donnees
// si l'utilisateur est connecté affichage de la page mon profil
if (utilisateurDAO::isLoggedOn()){
    include "$racine/controleur/monprofil.php";
}
else {
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueconnexion.php";
    include "$racine/vue/pied.html.php";
}

?>