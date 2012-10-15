<form action="<?php echo $_SERVER['PHP_SELF']."?module=equipe&action=ajouter"; ?>" method="post" accept-charset="utf-8">
   Annee de création :<input type="text" name="annee_creation" value="<?php checkVar('annee_creation') ?>"><br />
   Annee de disparition :<input type="text" name="annee_disparition"value="<?php checkVar('annee_disparition') ?>" ><br />
   <hr>
<?php include_once("modules/sponsor/ajouter.php"); ?>
   <hr>

   <p><input type="submit" value="envoyer"></p>
</form>
