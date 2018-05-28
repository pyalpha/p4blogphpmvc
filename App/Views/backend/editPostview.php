<?php
	$title = 'Modifier l’article';
	ob_start();
	?>
	<div class="container">
		<h1 class="text-center">Modifier l’article</h1>
		<form id="get-data-form" method="post" action="index.php?access=admin&interface=update_post&id=<?= $postContent['id']?>">
			<textarea id="articleContent" name="articleContent" class="tinymce"><?= $postContent['content']; ?></textarea>
			<input class="btn btn-success button-valider-article" type="submit" value="Envoyer">
		</form>

		<br/>

		
		<a class="btn btn-info" href="index.php?access=admin&interface=dashboard">Retour au Tableau de bord</a>

	</div>

	<?php
	$content = ob_get_clean();
	require('templateAdmin.php');
?>