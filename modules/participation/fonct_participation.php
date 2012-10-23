 <?php
  function listingParticipation($conn)
   {
	  $re = ExecuterRequete($conn,"select an.annee,cou.nom,cou.prenom,par.n_dossard,par.jeune,spo.nom as nom_sponsor
	  from ".TDF_PARTICIPATION." par
	  join ".TDF_SPONSOR." spo on spo.n_sponsor=par.n_sponsor and spo.n_equipe=par.n_equipe
	  join ".TDF_COUREUR." cou on cou.n_coureur=par.n_coureur
	  join ".TDF_ANNEE." an    on an.annee=par.annee
    order by par.n_coureur asc");
	 AfficherDonnee($re);
   }
?>
