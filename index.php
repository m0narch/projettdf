<?php
   session_start();

// Initialisation
include 'php_dir/global/init.php';

// Début du code HTML
include 'php_dir/global/header.php';

// Si un module est specifié, on regarde s'il existe
if (!empty($_GET['module'])&& !is_array($_GET['module'])&& (strpos($_GET['module'],'.')===false) ) {

	$module = dirname(__FILE__).'/modules/'.$_GET['module'].'/';

	// Si l'action est specifiée, on l'utilise, sinon, on tente une action par défaut
	$action = (!empty($_GET['action'])&& !is_array($_GET['action']) && (strpos($_GET['action'],'.')===false)) ? $_GET['action'].'.php' : 'index.php';

	// Si l'action existeiste, on l'exécute
	if (is_file($module.'/'.$action)) {

		include $module.'/'.$action;

		// Sinon, on affiche la page d'accueil !
	} else {

		include 'php_dir/global/erreur.php';
	}

	// Module non specifié ou invalide ? On accueilffiche la page d'accueil !
} else {

	include 'php_dir/global/accueil.php';
}

// Fin du code HTML
include 'php_dir/global/footer.php';

?>
