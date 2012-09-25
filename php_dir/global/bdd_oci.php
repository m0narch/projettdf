<?php

   //---------------------------------------------------------------------------------------------

   function OuvrirConnexion($session,$mdp,$instance)
   {
     $conn = oci_connect($session, $mdp,$instance);
     //echo "<br />identifiant : $conn<br />";
     if (!$conn)
     {
	   $e = oci_error();
	   print htmlentities($e['message']);
	   exit;
     }
     return $conn;
   }
   //---------------------------------------------------------------------------------------------
   function ExecuterRequete($conn,$req)
   {
     $cur = oci_parse($conn, $req);
     if (!$cur)
     {
	   $e = oci_error($conn);
	   print htmlentities($e['message']);
	   exit;
     }
     $r = oci_execute($cur, OCI_DEFAULT);
     if (!$r)
     {
	   $e = oci_error($stid);
	   echo htmlentities($e['message']);
	   exit;
     }
     oci_commit($conn);
     return $cur;
   }
   //---------------------------------------------------------------------------------------------
   function FermerConnexion($conn)
   {
     oci_close($conn);
   }
   //---------------------------------------------------------------------------------------------
   function AfficherDonnee($cur)
   {
     $nbLignes = oci_fetch_all($cur, $tab,0,-1,OCI_ASSOC); //OCI_FETCHSTATEMENT_BY_ROW, OCI_ASSOC, OCI_NUM
     if ($nbLignes > 0)
     {
	   echo "<table border=\"1\">\n";
		 echo "<tr>\n";
		    foreach ($tab as $key => $val)  // lecture des noms de colonnes
		    {
			  echo "<th>$key</th>\n";
		    }
		    echo "</tr>\n";
		 for ($i = 0; $i < $nbLignes; $i++) // balayage de toutes les lignes
		 {
		    echo "<tr>\n";
			  foreach ($tab as $data) // lecture des enregistrements de chaque colonne
			  {
			    echo "<td>$data[$i]</td>\n";
			  }
			  echo "</tr>\n";
		 }
		 echo "</table>\n";
     }
     else
     {
	   echo "Pas de ligne<br />\n";
     }
   }
   //---------------------------------------------------------------------------------------------
?>
