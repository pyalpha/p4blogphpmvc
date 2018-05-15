<?php
	$title = "Panneau d'administration";
	ob_start(); ?>
	<h1 class="text-center mt-12">Panneau d'administration</h1>
	<a href="index.php?access=admin&interface=createNewArticle" class="btn btn-success">Ajouter un article</a>
	<a href="index.php?access=admin&interface=reported_comments" class="btn btn-danger">Commentaires signalés</a>

	<table class="table">
		<thead>
			<tr>
				<th scope="col">N°</th>
				<th scope="col">Contenu</th>
				<th scope="col">Date de publication</th>
				<th scope="col">Modifier</th>
				<th scope="col">Sélectionner</th>
			</tr>
		</thead>
		<tbody>
			
		
			<form method="POST" action="index.php?access=admin&interface=delete_post">
			<?php
			while($post = $posts->fetch())
			{
				?>
				<tr>
					<th scope="row"><?= $post['id'] ?></th>
					<td><?= strip_tags($post['excerpt']); ?><a href="index.php?action=post&id=<?=$post['id']?>">[...]</a></td>
					<td><?= $post['creation_date']; ?></td>
					<td><a href="index.php?access=admin&interface=edit&id=<?= $post['id'] ?>">Modifier</a></td>
					<td><input type="checkbox" name="checked_post_id[]" value="<?= $post['id']; ?>"></td>
				</tr>
				<?php
			}
			$posts->closeCursor(); // end of the query
			?>

		<br/>
		</tbody>
	</table>
				<input type="submit" value="Effacer les articles" class="btn btn-danger float-right">
			</form>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>Pages
						<?php
						for ($i=1; $i < $nombreDePages; $i++) { 
							if($i == $pageCourante)
							{
								echo $i;
							}
							else
							{
								?>
							<a href="index.php?access=admin&interface=dashboard&page=<?= $i ?>"><?= $i ?></a>
							<?php
							}
						}
						?>
					</p>
				</div>
			</div>
		</div>
	<a href="index.php" class="btn btn-primary float-left">Retourner à l'accueil</a>
	<?php
	$posts->closeCursor();
	$content = ob_get_clean();
	require('templateAdmin.php');
?>