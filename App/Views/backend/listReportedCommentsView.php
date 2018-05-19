<?php
	$title = 'Commentaires signalés';
	ob_start();
	?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center blue mt-6">Commentaires signalés</h1>

				<table class="table mt-5">
					<thead>
						<tr>
							<th scope="col"></th>
							<th scope="col">Posté par</th>
							<th scope="col">Contenu</th>
							<th scope="col">Date de publication</th>
							<th scope="col" class="background-purple">Signalé par </th>
							<th scope="col" class="background-purple">Motif </th>
							<th scope="col" class="background-purple">Signalé le</th>
						</tr>
					</thead>
					<tbody>
						
					
						<form method="POST" action="index.php?access=admin&interface=delete_reported_comment">
						<?php
						while($data = $query->fetch())
						{
							?>
							<tr>
								<td scope="row"><input type="checkbox" name="checked_comment_id[]" value="<?= $data['id']; ?>"></td>
								<th scope="row"><?= $data['author']?></th>
								<td scope="row"><?= $data['comment_excerpt']?></td>
								<td scope="row"><?= $data['comment_date']?></td>
								<td scope="row"><?= $data['reported_by']?></td>
								<td scope="row"><?= $data['reason']?></td>
								<td scope="row"><?= $data['report_date']?></td>
							</tr>
							<?php
						}
						$query->closeCursor(); // end of the query
						?>
						
					</tbody>
				</table>
				<p class="mt-3">Pages <?php
					for ($i=1; $i <= $nombreDePages; $i++) { 
						if($i == $pageCourante)
						{
							echo $i;
						}
						else
						{
							?>
						<a href="index.php?access=admin&interface=reported_comments&page=<?= $i ?>"><?= $i ?></a>
						<?php
						}
					}
					?>
				</p>

						<input type="submit" value="Effacer la sélection" class="btn btn-danger">
					</form>

			</div>
		</div>
	</div>
	<?php
	$content = ob_get_clean(); // content of the view
	require('templateAdmin.php'); // call the template 
?>