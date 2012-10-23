<form action="<?php echo $_SERVER['PHP_SELF']."?module=sponsor&action=ajouter"; ?>" method="post" accept-charset="utf-8">
   Nom :<input type="text" name="nom" value="<?php checkVar('nom') ?>" required ><br />
   Nom abregé :<input type="text" name="na_sponsor" value="<?php checkVar('na_sponsor') ?>" required ><br />
   Annee Sponsor :<input type="text" name="annee_sponsor" placeholder="<?php echo date('Y') ?>"><br />
   <?php formSponsor($conn); ?>
   <?php formPays($conn); ?>
   <p><input type="submit" value="envoyer"></p>
</form>
