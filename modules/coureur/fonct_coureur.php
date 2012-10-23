<?php
   function replaceNom($chaine)
   {
	  $str=trim($chaine);
	  $str=strToNoAccentNom($str);
	  $str=mb_strtoupper($str,'UTF-8');
	  $str=preg_replace("#[\-]{3,}#","--",$str);
	  $str=preg_replace("#[']{2,}#","'",$str);
	  $str=preg_replace("#[ ]{2,}#"," ",$str);
	  return $str;
   }

   function formatNomCoureur($chaine)
   {
	  $str=replaceNom($chaine);
	  if(preg_match("#^[\']?[a-z]*(?:(?:[ \'])?|(?:[-]){0,2}[a-z])*[a-z]*[\']?$#i",$str))
	  {
		 return $str;
	  }
   }

   function verifNomCoureur($chaine)
   {
	  $str=replaceNom($chaine);
	  if(!preg_match("#^[\']?[a-z]*(?:(?:[ \'])?|(?:[-]){0,2}[a-z])*[a-z]*[\']?$#i",$str))
	  {
		 return false;
	  }
	  else
	  {
		 if(mb_strlen($str,'UTF-8')<=30)
		 {
			return true;
		 }
		 else
		 return false;
	  }
   }

   function replacePrenom($chaine)
   {
	  $str=trim($chaine);
	  $str=preg_replace("#[\-]{2,}#","-",$str);
	  $str=preg_replace("#[']{2,}#","'",$str);
	  $str=preg_replace("#[\ ]{2,}#"," ",$str);
	  $str=strUc_maj($str);
	  $str=strToNoAccentPrenom($str);
	  return $str;
   }

   function formatPrenom($chaine)
   {
	  $str=replacePrenom($chaine);
	  if(preg_match("#^[\']?[A-Z]*(?:(?:[ \-'])?[a-zàâäîïôöùûüéèêëç])*[a-zàâäîïôöùûüéèêëç]*[\']?$#i",$str))
	  {
		 return $str;
	  }
   }

   function verifPrenom($chaine)
   {
	  $str=replacePrenom($chaine);
	  if(!preg_match("#^[\']?[A-Z]*(?:(?:[ \-'])?[a-zàâäîïôöùûüéèêëç])*[a-zàâäîïôöùûüéèêëç]*[\']?$#i",$str))
	  {
		 return false;
	  }
	  else
	  {
		 if(mb_strlen($str,'UTF-8')<=20)
		 {
			return true;
		 }
		 else
		 return false;
	  }
   }



   function strToNoAccentPrenom($var)
   {
	  $var = str_replace(
		 array(
			'À', 'Â', 'Ä', 'Á', 'Ã', 'Å',
			'Î', 'Ï', 'Ì', 'Í',
			'Ô', 'Ö', 'Ò', 'Ó', 'Õ', 'Ø',
			'Ù', 'Û', 'Ü', 'Ú',
			'É', 'È', 'Ê', 'Ë',
			'Ç', 'Ÿ', 'Ñ', 'Ý',
			'æ', 'œ', 'Š'
		 ),
		 array(
			'A', 'A', 'A', 'A', 'A', 'A',
			'I', 'I', 'I', 'I',
			'O', 'O', 'O', 'O', 'O', 'O',
			'U', 'U', 'U', 'U',
			'E', 'E', 'E', 'E',
			'C', 'Y', 'N','Y',
			'ae', 'oe', 'S'
		 ),$var);
		 return $var;
	  }

	  function strUc_maj($var)
	  {
		 $var = mb_strtolower($var,'UTF-8');
		 $varExplode=array(' ','-','\'');
		 foreach($varExplode as $sepa)
		 {
			$varTab = array();
			$varMaj = explode($sepa, $var);
			foreach($varMaj as $mot)
			{
			   $mot =my_mb_ucfirst($mot, 'UTF-8',false);
			   array_push($varTab, $mot);
			}
			$var=implode($sepa,$varTab);
		 }
		 return $var;
	  }

	  function my_mb_ucfirst($str, $encoding = "UTF-8", $lower_str_end = true)
	  {
		 $first_letter = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding);
		 $str_end = "";
		 if ($lower_str_end)
		 {
			$str_end = mb_strtolower(mb_substr($str, 1, mb_strlen($str, $encoding), $encoding), $encoding);
		 }
		 else
		 {
			$str_end = mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);
		 }
		 $str = $first_letter . $str_end;
		 return $str;
	  }

	  function insertion_coureur($conn,$n_coureur, $nom, $prenom, $code_tdf, $annee_tdf, $annee_naissance)
	  {
		 if(empty($conn))
		 {
			return false;
		 }
		 $cur = oci_parse($conn,'insert into  '.TDF_COUREUR.' (n_coureur, nom, prenom, code_tdf, annee_tdf, annee_naissance,compte_oracle,date_insert) values (:n_coureur, upper(:nom), :prenom, :code_tdf, :annee_tdf, :annee_naissance,\'ETU2_42\',sysdate)');

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
		 $cur = oci_parse($conn,'select 1 from '.TDF_COUREUR.' where nom = :nom and prenom = :prenom and code_tdf = :code');
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

	  function max_n_coureur($conn)
	  {
		 if(empty($conn))
		 {
			return NULL;
		 }
		 $cur = oci_parse($conn,'select max(n_coureur)+5 as N_COUREUR from '.TDF_COUREUR.'');
		 if (!$cur)
		 {
			return NULL;
		 }

		 if(!oci_execute($cur, OCI_DEFAULT))
		 {
			return NULL;
		 }
		 $tab = oci_fetch_array ($cur , 0);
		 if($tab == false)
		 {
			return 0;
		 }
		 return $tab[0];

	  }

	  function verifDateNaissance($date)
	  {

		 $date_actuelle=date('Y');
		 if(preg_match('#[12][0-9]{3}#',$date))
		 {
			if(($date_actuelle-$date)>=17)
			{
			   return true;
			}
			else
			return false;
		 }
		 return false;
	  }

	  function verifDateTDF($date)
	  {
		 $date_actuelle=date('Y');
		 if(preg_match('#[12][0-9]{3}#',$date))
		 {
			if(($date>=1903)&&(($date_actuelle-$date)>=0))
			{
			   return true;
			}
		 }
		 return false;
	  }

	  function verifDateNaissanceTDF($date1,$date2)
	  {
		 if(preg_match('#[12][0-9]{3}#',$date1))
		 {
			if(preg_match('#[12][0-9]{3}#',$date2))
			{
			   if(($date1-$date2)>=17)
			   {
				  return true;
			   }
			}
		 }
		 return false;
	  }
	  function listingCoureur($conn)
	  {
		 $re = ExecuterRequete($conn,"select n_coureur,nom,prenom,code_tdf,annee_naissance,annee_tdf from ".TDF_COUREUR);
		 AfficherDonnee($re);
	  }

   ?>
