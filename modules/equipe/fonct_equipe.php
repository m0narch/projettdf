 <?php
  function listingEquipe($conn)
   {
	  $re = ExecuterRequete($conn,"select * from tdf_equipe   ");
	 AfficherDonnee($re);
   }
?>
