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

// recuperation des donnees POST

$nomoeuvre ="";
if (isset($_POST["nom"])){
    $nomoeuvre = $_POST["nom"];
}

//recherche des oeuvres par rapport au nomoeuvre rentré en paramètre
$oeuvrebynom = oeuvreDAO::getOeuvreByNomDAO($nomoeuvre);


// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/entete.html.php";
include "$racine/vue/vuerechercher.php";
if (!empty($_POST)){
    include "$racine/vue/vueresultatrecherche.php";
}
include "$racine/vue/pied.html.php";


?>