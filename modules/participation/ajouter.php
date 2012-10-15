<?php
   if(!empty($_POST['n_coureur']) && !empty($_POST['n_equipe']) && !empty($_POST['annee']))
   {
	  echo  '<a href="?module=participation&action=ajouter" >Retour</a>';
   }
   else
   {
	  include "modules/participation/vues/ajouter.php";
   }
?>

