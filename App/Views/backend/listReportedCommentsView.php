<?php
	$title = 'Commentaires signalés';
	ob_start();
	?>
	<h1>Commentaires signalés</h1>
	<form method="POST" action="index.php?access=admin&interface=delete_reported_comment">
	<?php
		while ($data = $query->fetch())
		{
		?>
			<div class="news">
				<p>
					<?= $data['author']?> : <?= $data['comment'] ?> <a href="index.php?action=comment&id=<?= $data['id'] ?>">Accéder au commentaire</a>
					<input type="checkbox" name="checked_comment_id[]" value="<?= $data['id']; ?>">
				</p>
			</div>
		<?php 
		}
	?>
	<input type="submit" value="Effacer la sélection">
	</form>
	<?php
	$query->closeCursor(); // end of the query
	?>
	<br>
	<a href="index.php?access=admin&page=dashboard">Retour au panneau d'administration</a>
	<?php
	$content = ob_get_clean(); // content of the view
	require('templateAdmin.php'); // call the template 
?>