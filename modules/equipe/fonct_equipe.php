 <?php
  function listingEquipe($conn)
   {
	  $re = ExecuterRequete($conn,"select * from ".TDF_EQUIPE);
	 AfficherDonnee($re);
   }

   function formEquipe($conn)
   {
	  $req='SELECT N_EQUIPE FROM '.TDF_EQUIPE.' where annee_disparition !=null';
	  $cur=ExecuterRequete($conn,$req);
	 // setEquipeForm($cur);
   }

/*
   function setEquipeForm($cur)
   {
	  $nbLignes = oci_fetch_all($cur, $tab,0,-1,OCI_ASSOC);
	  $i=0;
	  if($nbLignes>0)
	  {
		 echo "<select name=\"equipe\" size=\"1\">\n";
			for ($i = 0; $i < $nbLignes; $i++) // balayage de toutes les lignes
			{

			   echo '<option value="'.$tab['N_EQUIPE'][$i].'" >'.$tab['NOM'][$i];
			   echo "</option>\n";
			}
			echo  "</select>\n";;
	  }
   }
*/

?>
