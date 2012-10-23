<?php
   $err_pays=0;
   include 'modules/pays/fonct_pays.php';
   if(!empty($_POST['nom_pays']) && !empty($_POST['code_tdf']) && !empty($_POST['code_pays']))
   {
	  $nompays=$_POST['nom_pays'];
	  $codetdf=$_POST['code_tdf'];
	  $codepays=$_POST['code_pays'];
	  if(!verifNPays($nompays))
	  {
		 echo '[-] Erreur .</br>';
		 echo '[-] Nom du pays invalide .</br>';
	  }
	  elseif(!verifCode($codetdf))
	  {
		 echo '[-] Erreur .</br>';
		 echo '[-] Code tdf invalide .</br>';
	  }
	  elseif(!verifCode($codepays))
	  {
		 echo '[-] Erreur .</br>';
		 echo '[-] Code pays invalide .</br>';
	  }
	  elseif(CodePaysExiste($conn,$codepays))
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 echo '[-] Le code Pays est déjà présent.</br>';
	  }
	  elseif(NomPaysExiste($conn,$nompays))
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 echo '[-] Le nom est déjà présent. </br>';
	  }
	  elseif(PaysExiste($conn,$codetdf))
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 echo '[-] Le code tdf est déjà présent. </br>';
	  }
	  elseif(PaysPresent($conn,$codetdf,$codepays,$nompays))
	  {
		 echo '[-] Erreur lors de l\'ajout ! </br>';
		 echo '[-] Le pays est déjà présent. </br>';
	  }
	  elseif(insertion_pays($conn,formatNom($nompays), $codetdf, $codepays))
	  {
		 echo '[+] Pays ajouté avec succés. </br>';
	  }
   }
   else
   {
	  include 'modules/pays/vues/ajouter.php';
   }

?>
