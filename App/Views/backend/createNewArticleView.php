<?php
	$title = "Ajouter un nouvel article";
	ob_start();
	?>

	<div class="container">
		<h1 class="text-center">Ajouter un nouvel article</h1>

		<form id="get-data-form" method="post" action="index.php?access=admin&interface=postArticle">
			<input class="form-control" id="articleContentTitle" name="articleContentTitle" placeholder="Saisissez votre titre ici"></input>
			<textarea id="articleContent" name="articleContent" class="tinymce"></textarea>
			<input class="btn btn-success button-valider-article"type="submit" value="Envoyer">
		</form>

		<a class="btn btn-info" href="index.php?access=admin&interface=dashboard">Retour au Tableau de bord</a>
    </div>

	<?php
	$content = ob_get_clean();
	require('templateAdmin.php');
?>