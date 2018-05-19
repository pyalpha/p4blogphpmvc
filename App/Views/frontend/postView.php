<?php
$title = 'Article';
ob_start();
?>

<div class="container-fluid"><!--container-->
	<div class="row"><!--row-->
		<div class="col-12"><!--col-->
			<?= $post['content']; ?>
		</div><!--/col -->
	</div><!--/row-->

	<div class="row"><!--row-->
		<div class="col-12">	<!--col-->
			<h2 class="blue">Commentaires (<?= $numberOfComments ?>)</h2>

			<?php
			if(!empty($_SESSION) && isset($_SESSION['rank']))
			{
				if($_SESSION['rank'] == 'default_user' || $_SESSION['rank'] == 'admin')
				{
					?>
					<form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
						<div>
							<textarea id="comment" class="mt-3" name="comment" placeholder="Laisser un commentaire"></textarea>
						</div>
						<div>
							<input type="submit" class="btn btn-primary pl-5 pr-5 mt-3 mb-3" />
						</div>
					</form>
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
				<div class="row mt-4">
					<div class="col-12 col-lg-2">
						<?= 'Par '.'<span class="blue"><b>'.$comment['author'].'</b></span>'.' le '.$comment['comment_date_fr'];?>
					</div>
					<div class="col-12 col-lg-10">
						<?php
						if(!empty($_SESSION) && isset($_SESSION['rank'])) 
						{
							if($_SESSION['rank'] == 'default_user' || $_SESSION['rank'] == 'admin')
							{
								?><a data-toggle="modal" href="#ModalReportComment<?=$comment['id'];?>"><i class="fas fa-flag orange fa-1_5x"></i></a>
					
								
					<!-- Modal Report Comment-->
					<div class="modal fade" id="ModalReportComment<?=$comment['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title orange" id="exampleModalLabel">Signaler un commentaire</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form method="post" action="index.php?action=report_comment&post_id=<?=$_GET['id'];?>&comment_id=<?=$comment['id'];?>">
										<label>Votre pseudo</label>
										<p class="fakeInput col-12 inputPaddingFix"><?= $_SESSION['name']; ?></p>
										<label>Motif du signalement</label><br/>
										<textarea placeholder="Exemple : injures, incitation à la haine, racisme..." name="reason" class="col-12 inputPaddingFix"></textarea><br/>
										<input type="submit" value="Signaler" class="report-btn mt-4" />
									</form>
								</div>
							</div>
						</div>
					</div>
							<?php
						} // end of rank check
					} // end of check if connected and if rank is set
					?>
					</div>
					<div class="col-12 comment">
						<?= $comment['comment']; ?>	
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




