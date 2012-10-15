<form action="<?php echo $_SERVER['PHP_SELF']."?module=directeur&action=ajouter"; ?>" method="post" accept-charset="utf-8">
   Nom :<input type="text" name="nom" value="<?php checkVar('nom') ?>" required ><br />
   Prenom :<input type="text" name="prenom" value="<?php checkVar('prenom') ?>" required ><br />
  
   <p><input type="submit" value="envoyer"></p>
</form>
