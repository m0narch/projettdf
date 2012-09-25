<!-- ajouter pays -->
<form action="<?php echo $_SERVER['PHP_SELF'].'?module=pays&action=ajouter' ?>" method="post" accept-charset="utf-8">

   Nom du pays:<input type="text" name="nom" value="<?php checkVar('nom')?>" required></br>
	Code tdf :<input type="text" name="code_tdf" value="<?php checkVar('code_tdf') ?>" required></br>
	Code_pays :<input type="text" name="code_pays" value="<?php checkVar('code_pays')?>"></br>

	<p><input type="submit" value="Valider"></p>
 </form>
