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
include_once "$racine/modele/utilisateur.php";
include_once "$racine/modele/utilisateurDAO.php";

// recuperation des donnees GET, POST, et SESSION
$idOeuvre = $_GET["idoeuvre"];
$idartiste = $_GET["idartiste"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeoeuvres = oeuvreDAO::getOeuvresDAO();
$listemusees = museeDAO::getMuseesDAO();
$listeartistes = artisteDAO::getArtistesDAO();
$uneoeuvre = oeuvreDAO::getUneOeuvreDAO($idOeuvre);
$unartiste = artisteDAO::getUnArtisteDAO($idartiste);
$artisteoeuvre = oeuvreDAO::getArtisteOeuvreDAO($idOeuvre);




// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees

include "$racine/vue/entete.html.php";
include "$racine/vue/vuecontact.php";
include "$racine/vue/pied.html.php";


?>