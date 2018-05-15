<?php

$title = "S'inscrire";
ob_start();
?>
<h1>Inscription</h1>

<form method="post" action="index.php?action=add_user">
	<input type="text" name="name" placeholder="Pseudo" /><br/>
	<input type="email" name="email" placeholder="Email" /><br/>
	<input type="password" name="password1" placeholder="Mot de passe" /><br/>
	<input type="password" name="password2" placeholder="Mot de passe" /><br/><br/>
	<input type="submit" value="S'inscrire" />
</form>

<?php
$content = ob_get_clean();
require('default.php');