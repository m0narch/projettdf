<?php
   $err_annee=0;
   include_once 'modules/annee/fonct_annee.php';

   if(!empty($_POST['annee']) )
   {
	  $annee=$_POST['annee'];
	  if(!empty($_POST['jours_repos']))
	  {
		 $jours_repos=$_POST['jours_repos'];
		 if($jours_repos <0)
		 $jours_repos=0;
	  }
	  else
	  {
		 $jours_repos=0;
	  }
	  if(!verifAnnee($annee))
	  {
		 $err_annee=1;
	  }
	  if(annee_exist($conn,$annee))
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 echo '[-] Année déjà présente dans la base. </br>';
	  }
	  elseif( $err_annee==0 and insertion_annee($conn,$annee,$jours_repos))
	  {
		 echo '[+] L\'année à été inseré dans la base. </br>';
	  }
	  else
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 if($err_annee==1)
		 {
			echo '[-] Année au mauvais format. </br>';
		 }
	  }
	  echo  '<a href="?module=annee&action=ajouter" >Retour</a>';
   }
   else
   {
	  include "modules/annee/vues/ajouter.php";
   }
?>

