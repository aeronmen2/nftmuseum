<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Untitled</title>
        <link rel="stylesheet" href="css/style.css">
	</head>

	<body>
				<header class="header">
					    <img src="images/NTFMuseumcopy.png" class="logo">
                        <nav>
                            <ul class="nav-area">
                                <li><a href="./?action=listeoeuvre" class="cool">Accueil</a></li>
                                <li><a href="./?action=listeoeuvre" class="cool">Oeuvres</a></li>
                                <li><a href="./?action=rechercher" class="cool">Rechercher</a></li>
                                <li><a href="./?action=contact" class="cool">Contactez-Nous</a></li>
                            </ul>
                         </nav>
                         <?php if(utilisateurDAO::isLoggedOn()){?>
                         <a href="./?action=monprofil" class="btn-area">Mon Profil</a>  
                         <?php } 
                         else {?>
                         <a href="./?action=connexion" class="btn-area">Connexion</a>
                         <?php } ?>
                </header>
		</nav>

