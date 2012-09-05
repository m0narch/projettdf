
<?php
    ini_set('display_startup_errors',1);
	  ini_set('display_errors',1);

	  error_reporting(-1);
   function verifNom($chaine)
   {
	  $str=trim($chaine);
	  echo $str ."</br>";
	  $str2=iconv("UTF-8","ISO-8859-1//IGNORE//TRANSLIT" ,$str );
	  echo $str2;
   }
   verifNom("æ«€æ¶«€ŧ¶€ħðđß");

?>
