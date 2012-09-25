<?php
   function replaceNom($chaine)
   {
	  $str=trim($chaine);
	  $str=strToNoAccent($str);
	  $str=mb_strtoupper($str,'UTF-8');
	  $str=preg_replace("#[\-]{3,}#","--",$str);
	  $str=preg_replace("#[']{2,}#","'",$str);
	  $str=preg_replace("#[ ]{2,}#"," ",$str);
	  return $str;
   }

   function formatNom($chaine)
   {
	  $str=replaceNom($chaine);
	  if(preg_match("#^[\']?[a-z]*(?:(?:[ \-']){0,2}[a-z])*[a-z]*[\']?$#i",$str))
	  {
		 return $str;
	  }
   }

   function verifNom($chaine)
   {
	  $str=replaceNom($chaine);
	  if(!preg_match("#^[\']?[a-z]*(?:(?:[ \-']){0,2}[a-z])*[a-z]*[\']?$#i",$str))
	  {
		 return false;
	  }
	  else
	  {
		 return true;
	  }
   }

   function replacePrenom($chaine)
   {
	  $str=trim($chaine);
	  $str=mb_strtoupper($str,'UTF-8');
	  $str=preg_replace("#[\-]{2,}#","-",$str);
	  $str=preg_replace("#[']{2,}#","'",$str);
	  $str=preg_replace("#[\ ]{2,}#"," ",$str);
	  $str=strUc_maj($str);
	  return $str;
   }

   function formatPrenom($chaine)
   {
	  $str=replacePrenom($chaine);
	  if(preg_match("#^[\']?[a-z]*(?:(?:[ \-'])?[a-z])*[a-z]*[\']?$#i",$str))
	  {
		 return $str;
	  }
   }

   function verifPrenom($chaine)
   {
	  $str=replacePrenom($chaine);
	  if(!preg_match("#^[\']?[a-z]*(?:(?:[ \-'])?[a-z])*[a-z]*[\']?$#i",$str))
	  {
		 return false;
	  }
	  else
	  {
		 return true;
	  }
   }

   function strToNoAccent($var)
   {
	  $var = str_replace(
		 array(
			'à', 'â', 'ä', 'á', 'ã', 'å',
			'î', 'ï', 'ì', 'í',
			'ô', 'ö', 'ò', 'ó', 'õ', 'ø',
			'ù', 'û', 'ü', 'ú',
			'é', 'è', 'ê', 'ë',
			'ç', 'ÿ', 'ñ',
			'À', 'Â', 'Ä', 'Á', 'Ã', 'Å',
			'Î', 'Ï', 'Ì', 'Í',
			'Ô', 'Ö', 'Ò', 'Ó', 'Õ', 'Ø',
			'Ù', 'Û', 'Ü', 'Ú',
			'É', 'È', 'Ê', 'Ë',
			'Ç', 'Ÿ', 'Ñ', 'ý', 'Ý',
			'æ', 'œ', 'š', 'Š',
		 ),
		 array(
			'a', 'a', 'a', 'a', 'a', 'a',
			'i', 'i', 'i', 'i',
			'o', 'o', 'o', 'o', 'o', 'o',
			'u', 'u', 'u', 'u',
			'e', 'e', 'e', 'e',
			'c', 'y', 'n',
			'A', 'A', 'A', 'A', 'A', 'A',
			'I', 'I', 'I', 'I',
			'O', 'O', 'O', 'O', 'O', 'O',
			'U', 'U', 'U', 'U',
			'E', 'E', 'E', 'E',
			'C', 'Y', 'N', 'y', 'Y',
			'AE', 'OE', 's', 'S',
		 ),$var);
		 return $var;
	  }

	  function strUc_maj($var)
	  {
		 $var = mb_strtolower($var);
		 $varExplode=array('\'',' ','-');
		 foreach($varExplode as $sepa)
		 {
			$varTab = array();
			$varMaj = explode($sepa, $var);
			foreach($varMaj as $mot)
			{
			   $mot = ucfirst($mot);
			   array_push($varTab, $mot);
			}
			$var=implode($sepa,$varTab);

		 }
		 return $var;
	  }
   ?>
