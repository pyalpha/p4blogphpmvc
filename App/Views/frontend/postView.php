<?php
//$title = 'Article';
$title = htmlspecialchars($post['title']);
ob_start();
?>

<div class="container-fluid"><!--container-->
	<div class="row">
		<div class="col-12">
		    <h1 class="mt-4"><?= $post['title']; ?></h1>
			<p><?= $post['content']; ?></p>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<h2 class="card-header">Commentaires (<?= $numberOfComments ?>)</h2>

			<?php
			if(!empty($_SESSION) && isset($_SESSION['rank']))
			{
				if($_SESSION['rank'] == 'default_user' || $_SESSION['rank'] == 'admin')
				{
					?>
					<div class="card-body">
						<form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
							<div class="form-group">
								<textarea class="form-control" rows="3" id="comment" class="mt-3" name="comment" placeholder="Laisser un commentaire"></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Valider</button>
						</form>
					</div>
					<?php
				}
				else
				{
					throw new Exception('Votre rang ne vous permet pas de laisser de commentaires.');
				}
			}
			else
			{
				echo '<h5 class="mb-5">Vous devez être connecté pour pouvoir laisser un commentaire !</h5>';
			}
			?>

			<?php
			while($comment = $comments->fetch())
			{
			?>
			<div class="col-12">
				<div class="media comment-box">
					<div class="media-body">
						<h4 class="media-heading"><?= '<span class="author-comment">'.$comment['author'].'</span>'.' le '.$comment['comment_date_fr'];?>
							<div>
								<?php
									if(!empty($_SESSION) && isset($_SESSION['rank'])) 
										{
											if($_SESSION['rank'] == 'default_user' || $_SESSION['rank'] == 'admin')
											{
												?><a class="report-comment-flag" data-toggle="modal" href="#ModalReportComment<?=$comment['id'];?>"><i class="fa fa-flag" aria-hidden="true"></i></a>
									
												
									<!-- Modal Report Comment-->
									<div class="modal fade" id="ModalReportComment<?=$comment['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Signaler un commentaire</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form method="post" action="index.php?action=report_comment&post_id=<?=$_GET['id'];?>&comment_id=<?=$comment['id'];?>">
														<label>Votre pseudo</label>
														<p class="fakeInput col-12 inputPaddingFix"><?= $_SESSION['name']; ?></p>
														<label>Motif du signalement</label><br/>
														<textarea placeholder="une description concernant le motif" name="reason" class="col-12 inputPaddingFix"></textarea><br/>
														<input type="submit" value="Signaler" class="btn btn-danger" />
													</form>
												</div>
											</div>
										</div>
									</div>
											<?php
										} // end of rank check
									}
								?>
							</div>
						</h4>
						<p><?= $comment['comment']; ?></p>
					</div>
				</div>
			</div>
			<?php
			} // end of the while loop
			$comments->closeCursor(); // end of the query
			?>

			<p class="mt-3">Pages <?php
				for ($i=1; $i <= $nombreDePages; $i++) { 
					if($i == $pageCourante)
					{
						echo $i;
					}
					else
					{
						?>
					<a href="index.php?action=post&id=22&page=<?= $i ?>"><?= $i ?></a>
					<?php
					}
				}
				?>
			</p>
		</div><!--/col -->
	</div><!--/row-->
</div> <!--/container  -->
<?php
$content = ob_get_clean();
require('default.php');
?>




