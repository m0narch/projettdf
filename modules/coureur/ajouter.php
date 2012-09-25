<?php

   function insertion_coureur($conn,$n_coureur, $nom, $prenom, $code_tdf, $annee_tdf, $annee_naissance)
   {
	  if(empty($conn))
	  {
		 return false;
	  }
	  $cur = oci_parse($conn,'insert into tdf_coureur(n_coureur, nom, prenom, code_tdf, annee_tdf, annee_naissance) values (:n_coureur, upper(:nom), :prenom, :code_tdf, :annee_tdf, :annee_naissance)');
	  if (!$cur)
	  {
		 return false;
	  }
	  oci_bind_by_name($cur, ":n_coureur", $n_coureur);
	  oci_bind_by_name($cur, ":nom", $nom);
	  oci_bind_by_name($cur, ":prenom", $prenom);
	  oci_bind_by_name($cur, ":code_tdf", $code_tdf);
	  oci_bind_by_name($cur, ":annee_tdf", $annee_tdf);
	  oci_bind_by_name($cur, ":annee_naissance", $annee_naissance);
	  if(!oci_execute($cur, OCI_DEFAULT))
	  {
		 return false;
	  }
	  $commit = oci_commit($conn);
	  if( ! $commit)
	  {
		 return false;
	  }
	  return true;
   }


   function coureur_exist($conn,$prenom, $nom, $code_tdf)
   {
	  if(empty($conn))
	  {
		 return NULL;
	  }
	  $cur = oci_parse($conn,'select 1 from tdf_coureur where nom = :nom and prenom = :prenom and code_tdf = :code');
	  if (!$cur)
	  {
		 return NULL;
	  }
	  oci_bind_by_name($cur, ":nom", $nom);
	  oci_bind_by_name($cur, ":prenom", $prenom);
	  oci_bind_by_name($cur, ":code", $code_tdf);
	  if(!oci_execute($cur, OCI_DEFAULT))
	  {
		 return NULL;
	  }
	  $tab = oci_fetch_array ($cur , 0);
	  if($tab == false)
	  {
		 return false;
	  }
	  return true;
   }


   include_once 'modules/pays/fonct_pays.php';
   include_once 'modules/coureur/fonct_coureur.php';

   if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['pays']))
   {
	  echo formatNom($_POST['nom']).'</br>';
	  echo formatPrenom($_POST['prenom']).'</br>';;

	  echo  '<a href="?module=coureur&action=ajouter" >Retour</a>';
   }
   else
   {
	  include "modules/coureur/vues/ajouter.php";
   }
?>

