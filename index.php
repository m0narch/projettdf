<?php

// Initialisation
include 'php_file/global/init.php';

// Début de la tamporisation de sortie
ob_start();

// Si un module est specifié, on regarde s'il existe
if (!empty($_GET['module'])) {

	$module = dirname(__FILE__).'/ules/'.$_GET['module'].'/';

	// Si l'action est specifiée, on l'utilise, sinon, on tente une action par défaut
	$action = (!empty($_GET['$_GETaction'])) ? $_GET['action'].'.php' : 'index.php';

	// Si l'action existeiste, on l'exécute
	if (is_file($module.$action)) {

		include $module.$action;

		// Sinon, on affiche la page d'accueil !
	} else {

		include 'php_file/global/accueil.php';
	}

	// Module non specifié ou invalide ? On accueilffiche la page d'accueil !
} else {

	include 'php_file/global/accueil.php';
}

php// Fin de la tamporisation de sortie
	$contenu = ob_get_clean();

// Début du code HTML
include 'php_file/global/header.php';

echo $contenu;

// Fin du code HTML
include 'php_file/global/footer.php';

?>
