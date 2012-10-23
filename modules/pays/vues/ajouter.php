<!-- ajouter pays -->
<form action="<?php echo $_SERVER['PHP_SELF'].'?module=pays&action=ajouter' ?>" method="post" accept-charset="utf-8">

   Nom du pays:<input type="text" name="nom_pays" value="<?php checkVar('nom_pays')?>" required></br>
	Code tdf :<input type="text" name="code_tdf" value="<?php checkVar('code_tdf') ?>" required></br>
	Code_pays :<input type="text" name="code_pays" value="<?php checkVar('code_pays')?>"required></br>

	<p><input type="submit" value="Valider"></p>
 </form>
