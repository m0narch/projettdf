<?php

   function verifAnnee($str)
   {
	  if(preg_match("#^[0-9]{4}$#",$str))
	  {
		 if($str>=1903 && $str<=date('Y'))
		 {
			return true;
		 }
	  }
	  return false;
   }
   
   function insertion_annee($conn,$annee,$jours_repos)
   {
	  if(empty($conn))
	  {
		 return false;
	  }
	  $cur = oci_parse($conn,'insert into tdf_annee(annee,jour_repos,compte_oracle,date_insert) values (:annee, :jours_repos,\'ETU2_42\',sysdate)');
	  if (!$cur)
	  {
		 return false;
	  }
	  oci_bind_by_name($cur, ":annee", $annee);
	  oci_bind_by_name($cur, ":jours_repos", $jours_repos);
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

   function annee_exist($conn,$annee)
   {
	  if(empty($conn))
	  {
		 return NULL;
	  }
	  $cur = oci_parse($conn,'select 1 from tdf_annee where annee = :annee');
	  if (!$cur)
	  {
		 return NULL;
	  }
	  oci_bind_by_name($cur, ":annee", $annee);
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

   function listingAnnee($conn)
   {
	  $re = ExecuterRequete($conn,"select * from tdf_annee order by annee desc");
	 AfficherDonnee($re);
   }
?>
