<?php

   function formPays($conn)
   {
	  $req='SELECT code_tdf,nom FROM tdf_pays ORDER BY code_tdf';
	  $cur=ExecuterRequete($conn,$req);
	  setPaysForm($cur);
   }

   function formatNom($ch)
   {
	  $ch2=strToNoAccentNom($ch);
	  $ch2=preg_replace("#[\-]{2,}#","-",$ch2);
	  return $ch2;
   }

   function verifNpays($chaine)
   {
	  $ch=formatNom($chaine);
	  if(!preg_match("#^[\']?[a-z]*(?:(?:[ \'])?|(?:[-]){0,1}[a-z])*[a-z]*[\']?$#i",$ch))
	  {
		 return false;
	  }
	  else
	  {
		 if(mb_strlen($ch,'UTF-8')<=20)
		 {
			return true;
		 }
		 else
		 return false;
	  }

   }

   function verifCode($chaine)
   {
	  $ch=strToNoAccentNom($chaine);
	  if(!preg_match("#^[\']?[a-z]*(?:(?:[ \'])?|(?:[-]){0,2}[a-z])*[a-z]*[\']?$#i",$ch))
	  {
		 return false;
	  }
	  else
	  {
		 if(mb_strlen($ch,'UTF-8')<=3)
		 {
			return true;
		 }
		 else
		 return false;
	  }


   }

   function setPaysForm($cur)
   {
	  $nbLignes = oci_fetch_all($cur, $tab,0,-1,OCI_ASSOC);
	  $i=0;
	  if($nbLignes>0)
	  {
		 echo "<select name=\"pays\" size=\"1\">\n";
			for ($i = 0; $i < $nbLignes; $i++) // balayage de toutes les lignes
			{

			   echo '<option value="'.$tab['CODE_TDF'][$i].'" >'.$tab['NOM'][$i];
			   echo "</option>\n";
			}
			echo  "</select>\n";;
	  }
   }

	  function PaysExiste($conn,$code_tdf)
	  {
		 if(empty($conn))
		 {
			return false;
		 }
		 $cur = oci_parse($conn,'select 1 from '.TDF_PAYS.' where upper(code_tdf) = upper(:code)');
		 if (!$cur)
		 {
			return false;
		 }
		 oci_bind_by_name($cur, ":code", $code_tdf);
		 if(!oci_execute($cur, OCI_DEFAULT))
		 {
			return false;
		 }
		 $tab = oci_fetch_array ($cur , 0);
		 if($tab == false)
		 {
			return false;
		 }
		 return true;
	  }

	  function PaysPresent($conn,$code_tdf,$code_pays,$nom)
	  {
		 if(empty($conn))
		 {
			return false;
		 }
		 $cur = oci_parse($conn,'select 1 from '.TDF_PAYS.' where upper(code_tdf) = upper(:code) and upper(c_pays)=upper(:code_pays) and upper(nom) = upper(:nom)');
		 if (!$cur)
		 {
			return false;
		 }
		 oci_bind_by_name($cur, ":code", $code_tdf);
		 oci_bind_by_name($cur, ":code_pays", $code_pays);
		 oci_bind_by_name($cur, ":nom", $nom);
		 if(!oci_execute($cur, OCI_DEFAULT))
		 {
			return false;
		 }
		 $tab = oci_fetch_array ($cur , 0);
		 if($tab == false)
		 {
			return false;
		 }
		 return true;
	  }

	  function CodePaysExiste($conn,$codePays)
	  {
		 if(empty($conn))
		 {
			return false;
		 }
		 $cur = oci_parse($conn,'select 1 from  '.TDF_PAYS.' where upper(c_pays) = upper(:code)');
		 if (!$cur)
		 {
			return false;
		 }
		 oci_bind_by_name($cur, ":code", $codePays);
		 if(!oci_execute($cur, OCI_DEFAULT))
		 {
			return false;
		 }
		 $tab = oci_fetch_array ($cur , 0);
		 if($tab == false)
		 {
			return false;
		 }
		 return true;
	  }

	  function NomPaysExiste($conn,$nomPays)
	  {
		 if(empty($conn))
		 {
			return false;
		 }
		 $cur = oci_parse($conn,'select 1 from '.TDF_PAYS.' where upper(NOM) = upper(:nom)');
		 if (!$cur)
		 {
			return false;
		 }
		 oci_bind_by_name($cur, ":nom", $nomPays);
		 if(!oci_execute($cur, OCI_DEFAULT))
		 {
			return false;
		 }
		 $tab = oci_fetch_array ($cur , 0);
		 if($tab == false)
		 {
			return false;
		 }
		 return true;
	  }

	  function insertion_pays($conn,$nom, $code_tdf, $code_pays)
	  {
		 if(empty($conn))
		 {
			return false;
		 }
		 $cur = oci_parse($conn,'insert into '.TDF_PAYS.'(code_tdf,c_pays,nom,compte_oracle,date_insert) values (upper(:code_tdf),upper(:code_pays),upper(:nom),\'ETU2_42\',sysdate)');
		 if (!$cur)
		 {
			return false;
		 }
		 oci_bind_by_name($cur, ":code_tdf", $code_tdf);
		 oci_bind_by_name($cur, ":code_pays", $code_pays);
		 oci_bind_by_name($cur, ":nom", $nom);
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

	  function listingPays($conn)
	  {
		 $re = ExecuterRequete($conn,"select nom,code_tdf,c_pays from ".TDF_PAYS);
		 AfficherDonnee($re);
	  }
   ?>
