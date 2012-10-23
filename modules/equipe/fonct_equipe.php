 <?php
  function listingEquipe($conn)
   {
	  $re = ExecuterRequete($conn,"select * from '.TDF_EQUIPE");
	 AfficherDonnee($re);
   }
?>
