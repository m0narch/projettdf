<form action="<?php echo $_SERVER['PHP_SELF']."?module=participation&action=ajouter"; ?>" method="post" accept-charset="utf-8">
   Nom :<input type="text" name="nom" value="<?php checkVar('nom') ?>" required ><br />
   Prenom :<input type="text" name="prenom" value="<?php checkVar('prenom') ?>" required ><br />
   Annee de naissance :<input type="text" name="annee_naissance" value="<?php checkVar('annee_naissance') ?>"><br />
   Annee TDF :<input type="text" name="annee_tdf" placeholder="<?php echo date('Y') ?>"><br />
   <?php formPays($conn); ?>

   <p><input type="submit" value="envoyer"></p>
</form>
