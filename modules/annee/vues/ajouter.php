<!-- ajouter annee -->
<form action="<?php echo $_SERVER['PHP_SELF'].'?module=annee&action=ajouter' ?>" method="post" accept-charset="utf-8">

   Annee:<input type="text" name="annee" value="<?php checkVar('annee')?>" required></br>
   Jours de repos :<input type="text" name="jours_repos" value="<?php checkVar('jours_repos') ?>"></br>

	<p><input type="submit" value="Valider"></p>
 </form>
