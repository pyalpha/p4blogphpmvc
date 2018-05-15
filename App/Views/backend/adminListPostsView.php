<?php
	$title = "Panneau d'administration";
	ob_start(); ?>
	<h1>Panneau d'administration</h1>
	<a href="index.php?access=admin&page=createNewArticle">Créer un nouvel article</a><br/><br/>
	<a href="index.php?access=admin&page=reported_comments">Commentaires signalés</a>
	<form method="POST" action="index.php?access=admin&page=delete_post">
	<?php
	while($post = $posts->fetch())
	{
		?>
		<div class="">	
			<?= $post['excerpt']?>
			<a href="index.php?action=post&id=<?=$post['id']?>">[...]</a>
			<input type="checkbox" name="checked_post_id[]" value="<?= $post['id']; ?>">
			<span><?= 'Le '. $post['creation_date'] ?></span>
			<a href="index.php?access=admin&page=edit&id=<?= $post['id'] ?>">Modifier</a>
		</div>
		<?php
	}
	?>
		<input type="submit" value="Effacer la sélection">
	</form>

	<br/>
	<a href="index.php">Retour à l'accueil</a>
	<?php
	$posts->closeCursor();
	$content = ob_get_clean();
	require('templateAdmin.php');
?>