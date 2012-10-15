<?php
   $err_coureur=0;
   include_once 'modules/pays/fonct_pays.php';
   include_once 'modules/coureur/fonct_coureur.php';

   if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['pays']))
   {
	  $name_coureur=$_POST['nom'];
	  $firstname_coureur=$_POST['prenom'];
	  $c_pays=$_POST['pays'];
	  if(!empty($_POST['annee_naissance']))
	  {
		 if(verifDateNaissance($_POST['annee_naissance']))
		 {
			$annee_naissance=$_POST['annee_naissance'];
		 }
		 else
			$err_coureur=1;
	  }

	  if(!empty($_POST['annee_tdf']))
	  {
		 if(verifDateTDF($_POST['annee_tdf']))
		 {
			$annee_tdf=$_POST['annee_tdf'];
		 }
		 else
			$err_coureur=2;
	  }
	  if(!empty($annee_naissance)&&!empty($annee_tdf))
	  {
		 if(!verifDateNaissanceTDF($annee_tdf,$annee_naissance))
		 {
			$err_coureur=3;
		 }
	  }
	  if(!verifNom($name_coureur))
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 echo '[-] Le nom est invalide. </br>';
	  }
	  elseif(!verifPrenom($firstname_coureur))
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 echo '[-] Le prénom est invalide . </br>';
	  }
	  elseif(!PaysExiste($conn,$c_pays))
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 echo "[-] Le pays n'existe pas. </br>";
	  }
	  elseif(coureur_exist($conn,formatPrenom($firstname_coureur), formatNom($name_coureur),$c_pays))
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 echo '[-] Coureur déjà présent dans la base. </br>';
	  }
	  elseif( $err_coureur==0 and insertion_coureur($conn,max_n_coureur($conn),formatNom($name_coureur), formatPrenom($firstname_coureur), $c_pays, $_POST['annee_tdf'],$_POST['annee_naissance']) )
	  {
		 echo '[+] Le coureur à été inseré dans la base. </br>';
	  }
	  else
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 if($err_coureur==1)
		 {
			echo '[-] Date de naissance fausse. </br>';
		 }
		 if($err_coureur==2)
		 {
			echo '[-] Date de tdf fausse. </br>';
		 }
		 if($err_coureur==3)
		 {
			echo '[-] Vous avez participé avant votre majorité ?</br>';
		 }

	  }
	  echo  '<a href="?module=coureur&action=ajouter" >Retour</a>';
   }
   else
   {
	  include "modules/coureur/vues/ajouter.php";
   }
?>

