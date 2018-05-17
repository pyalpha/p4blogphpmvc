<?php

$title = "Panneau d'administration";
	ob_start(); ?>

	<div id="dashboard" class="container">
		<div class="row">
			<div class="col-12">
				
				<h1 class="text-center mt-6 blue">Panneau d'administration</h1>
				

				<table class="table mt-5">
					<thead>
						<tr>

							<th scope="col">N°</th>
							<th scope="col">Modifier</th>
							<th scope="col">Contenu</th>
							<th scope="col">Date de publication</th>
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
								<td scope="row"><a href="index.php?access=admin&interface=edit&id=<?= $post['id'] ?>"><i class="fas fa-edit blue"></i></a></td>
								<td scope="row"><?= strip_tags($post['excerpt']); ?><a href="index.php?action=post&id=<?=$post['id']?>">[...]</a></td>
								<td scope="row">Le <?= $post['creation_date']; ?></td>
								<td scope="row"><input type="checkbox" name="checked_post_id[]" value="<?= $post['id']; ?>"></td>
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
				<a href="index.php?access=admin&interface=createNewArticle" class="btn btn-success">Ajouter un article</a>
				<a href="index.php?access=admin&interface=reported_comments" class="btn btn-primary">Commentaires signalés</a><br>
				
			</div>
		</div>
	</div>

	<?php
	$posts->closeCursor();
	$content = ob_get_clean();
	require('templateAdmin.php');
?>