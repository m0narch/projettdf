<?php

   if(!empty($_SESSION['_login']) && !empty($_SESSION['_pass']))
   {

   ?>

   <style>
	  form, p, table, tr
	  {
			text-align: center;
	  }
   </style>

   <form action="<?php echo $_SERVER['PHP_SELF']."?module=admin&action=requete"; ?>"  method="post" >
	  <textarea  name="requete" rows="9" cols="50"></textarea><br/>
	  <input type="submit" />
   </form>
   <?php

	  if( empty($_POST['requete']))
	  {
		 echo '<p>Tape une requete.</p>';
	  }
	  else
	  {
		 if(!$conn)
		 {
			echo '<p>[i]Erreur de connexion.</p>';
			exit;
		 }
		 $re = ExecuterRequete($conn, $_POST['requete']);
		 if($re === true)
		 {
			echo '<p>[+]Modification de la base effectuée avec succés.</p>';
			exit;
		 }
		 else if($re === false)
		 {
			echo '<p>[i]Echec de modification !</p>';
			exit;
		 }
		 AfficherDonnee($re);
	  }
   ?>


   <?php
   }
   else
   {
	  echo 'veuillez vous connecter !<a href="?module=admin&action=">Connexion</a>';
   }
