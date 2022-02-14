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

if (isset($_POST["avis"])){
    $commentaire=$_POST["avis"];
}
else
{
    $commentaire="";
}

print($commentaire);

if($idartiste!="" &&  $idoeuvre!="" && $commentaire!=""){
avisDAO::addUnAvisDAO($idartiste, $idoeuvre, $commentaire);
}


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
//détail des oeuvres par rapport a un idoeuvre
$uneoeuvre = oeuvreDAO::getUneOeuvreDAO($idOeuvre);
$artisteoeuvre = oeuvreDAO::getArtisteOeuvreDAO($idOeuvre);
$museeoeuvre =oeuvreDAO::getMuseeOeuvreDAO($idOeuvre);




// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/entete.html.php";
include "$racine/vue/vuedetailoeuvre.php";
include "$racine/vue/pied.html.php";


?>