<?php
$title = "Tableau de bord";
	ob_start(); ?>

	<div id="dashboard" class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Tableau de bord</h1>
				<div class="button-bord">
					<a href="index.php?access=admin&interface=createNewArticle" class="btn btn-primary">Ajouter un article</a>
					<a href="index.php?access=admin&interface=reported_comments" class="btn btn-info">Commentaires signalés</a><br>
                </div>
				<div class="table-responsive">
					
					<table class="table table-striped custab">
						<thead>
							<tr>
								<th scope="col">Titre</th>
								<th scope="col">Contenu</th>
								<th scope="col">Date de publication</th>
								<th scope="col">Action</th>
								<th scope="col">Sélectionner</th>
							</tr>
						</thead>
						<tbody>
							
						
							<form method="POST" action="index.php?access=admin&interface=delete_post">
							<?php
							while($post = $posts->fetch())
							{
								?>
								<tr class="tableline">
									<td scope="row"><a class="title-table-dashboard" href="index.php?action=post&id=<?=$post['id']?>"><?= strip_tags($post['title']); ?></a></td>
									<td scope="row"><?= strip_tags($post['excerpt']); ?></td>
									<td scope="row">Le <?= $post['creation_date']; ?></td>
									<td class="text-center"><a class="editgreenlink" href="index.php?access=admin&interface=edit&id=<?= $post['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</a><br><a class="deletelink"href="index.php?access=admin&interface=delete&id=<?= $post['id'] ?>"><i class="fa fa-trash " aria-hidden="true"></i> Supprimer</a></td>
									<td scope="row"><input type="checkbox" name="checked_post_id[]" value="<?= $post['id']; ?>"></td>
								</tr>
								<?php
							}
							$posts->closeCursor(); // end of the query
							?>

						<br/>
						</tbody>
					</table>
								<input type="submit" value="Effacer les articles sélectionnés" class="btn btn-danger mb-3">
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
					
				</div>
			</div>
		</div>
	</div>

	<?php
	$posts->closeCursor();
	$content = ob_get_clean();
	require('templateAdmin.php');
?>

