<?php
   if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['pays']))
   {
	  echo  '<a href="?module=equipe&action=ajouter" >Retour</a>';
   }
   else
   {
	  include "modules/equipe/vues/ajouter.php";
   }
?>

