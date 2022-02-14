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

// recuperation des donnees GET 
$idOeuvre = $_GET["idoeuvre"];
$idartiste = $_GET["idartiste"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage

//tableau d'oeuvres
$listeoeuvres = oeuvreDAO::getOeuvresDAO();
//tableau de musees
$listemusees = museeDAO::getMuseesDAO();
//tableau d'artiste
$listeartistes = artisteDAO::getArtistesDAO();

//récupération des données d'une oeuvre et d'un artiste
$uneoeuvre = oeuvreDAO::getUneOeuvreDAO($idOeuvre);
$unartiste = artisteDAO::getUnArtisteDAO($idartiste);

// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/entete.html.php";
include "$racine/vue/vuedetailartistes.php";
include "$racine/vue/pied.html.php";


?>