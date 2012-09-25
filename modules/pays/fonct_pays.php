<?php

   function formPays($conn)
   {
	  $req='SELECT code_tdf,nom FROM tdf_pays ORDER BY code_tdf';
	  $cur=ExecuterRequete($conn,$req);
	  setPaysForm($cur);
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

			echo  "</select>\n";
	  }
   }

   function PaysExiste($conn,$code_tdf)
   {
	  if(empty($conn))
	  {
		 return false;
	  }
	  $cur = oci_parse($conn,'select 1 from tdf_pays where upper(code_tdf) = upper(:code)');
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

?>
