<?php
	$title = 'Mon blog'; ?>

	<?php ob_start(); ?>
		<h1 class="text-center mt-12 mb-4 title-monroman"> <i class="fa fa-book" aria-hidden="true"></i> Mon Roman : Billet simple pour l'Alaska</h1>
		
		<?php
		while ($data = $posts->fetch())
		{
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a class="card-title" href="index.php?action=post&id=<?=$data['id']?>"><h1><?= htmlspecialchars($data['title']) ?></h1></a>
					<p class="post-subtitle"><?= strip_tags($data['excerpt']); ?> <a class="post-meta" href="index.php?action=post&id=<?=$data['id']?>">[...] Lire la suite</a></p>
					<div>
						<span class="badge"><?= 'Le '. htmlspecialchars($data['creation_date']) ?></span>
						
						<div class="pull-right"><span>
							<a href="index.php?action=post&id=<?=$data['id']?>" class="comments"><i class="fa fa-comment" aria-hidden="true"></i>
							<?php
							$comments = $commentManager->countComments($data['id']);
							$numberOfComments = $comments['COUNT'];
							echo $numberOfComments;
							?>	
							</a>
						</span></div>         
					</div>
					<!--<hr> -->
				</div>
			</div>
		</div>
		
		<?php 
		} // end of the while loop
		?>
		<div class="container">
			<div class="row">
				<div class="col-md">
					<p>Pages
						<?php
						for ($i=1; $i <= $nombreDePages; $i++) { 
							if($i == $pageCourante)
							{
								echo $i;
							}
							else
							{
								?>
							<a href="index.php?action=listPosts&page=<?= $i ?>"><?= $i ?></a>
							<?php
							}
						}
						$posts->closeCursor(); // end of the query
						?>
					</p>
				</div>
			</div>
		</div>
	<br>
	<?php
	$content = ob_get_clean(); // content of the view
	require('default.php'); // call the template 