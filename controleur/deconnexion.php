<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/utilisateurDAO.php";


// traitement si necessaire des donnees recuperees
// permet de deconnecter l'utilisateur 
utilisateurDAO::logout();
     

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "authentification";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueconnexion.php";
include "$racine/vue/pied.html.php";


?>