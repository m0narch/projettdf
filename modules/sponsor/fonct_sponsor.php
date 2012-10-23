 <?php
  function listingSponsor($conn)
   {
	  $re = ExecuterRequete($conn,"select * from ".TDF_SPONSOR);
	 AfficherDonnee($re);
   }

   function formSponsor($conn)
   {
	  $req='SELECT spo.n_Sponsor,eq.n_equipe,spo.na_sponsor,spo.nom FROM 
	  '.TDF_SPONSOR.' spo join '.TDF_EQUIPE.' eq on eq.n_equipe=spo.n_equipe where eq.annee_disparition is null';
	  $cur=ExecuterRequete($conn,$req);
	  setSponsorform($cur);
   }


   function setSponsorform($cur)
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


?>
