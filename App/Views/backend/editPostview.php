<?php
	$title = 'Modifier un article';
	ob_start();
	?>
	<h1 class="text-center blue mt-12 mb-6">Modifier un article</h1>
	<form id="get-data-form" method="post" action="index.php?access=admin&interface=update_post&id=<?= $postContent['id']?>">
		<textarea id="articleContent" name="articleContent" class="tinymce"><?= $postContent['content']; ?></textarea>
		<input type="submit" value="Envoyer">
	</form>

	<br/>

	<a href="index.php?access=admin&interface=dashboard">Retour au panneau d'administration</a>

	<?php
	$content = ob_get_clean();
	require('templateAdmin.php');
?>