<?php
   $err_coureur=0;
   include_once 'modules/directeur/fonct_directeur.php';


   if(!empty($_POST['nom']) && !empty($_POST['prenom']))
   {
	  $name_directeur=$_POST['nom'];
	  $firstname_directeur=$_POST['prenom'];
	  if(!verifNom($name_directeur))
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 echo '[-] Le nom est invalide. </br>';
	  }
	  elseif(!verifPrenom($firstname_directeur))
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 echo '[-] Le prénom est invalide . </br>';
	  }
	  elseif(directeur_exist($conn,formatPrenom($firstname_directeur), formatNom($name_directeur)))
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 echo '[-] Directeur déjà présent dans la base. </br>';
	  }
	  elseif( $err_coureur==0 and insertion_directeur($conn,max_n_directeur($conn),formatNom($name_directeur), formatPrenom($firstname_directeur) ))
	  {
		 echo '[+] Le directeur à été inseré dans la base. </br>';
	  }
	  else
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
	  }
	  echo  '<a href="?module=directeur&action=ajouter" >Retour</a>';
   }
   else
   {
	  include "modules/directeur/vues/ajouter.php";
   }
?>

