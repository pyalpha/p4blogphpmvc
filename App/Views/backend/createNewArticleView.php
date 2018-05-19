<?php
	$title = "Créer un nouvel article";
	ob_start();
	?>

	<h1 class="text-center blue mt-12 mb-6">Créer un nouvel article</h1>

	<form id="get-data-form" method="post" action="index.php?access=admin&interface=postArticle">
		<textarea id="articleContent" name="articleContent" class="tinymce"></textarea>
		<input type="submit" value="Envoyer">
	</form>

	<?php
	$content = ob_get_clean();
	require('templateAdmin.php');
?>