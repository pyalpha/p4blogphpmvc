<?php
	
function getMenu()
{
	ob_start();?>
	<nav class="navbar navbar-expand-lg navbar-center navbar-light bg-light fixed-top">
		<a class="navbar-brand" href="index.php">Jean Forteroche</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul id="myScrollspy" class="navbar-nav mx-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=listPosts">Mon roman</a>
				</li>
				<?php
				if(isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['rank']) && $_SESSION['rank'] == 'admin')
				{
					?>
					<li class="nav-item">
						<a class="nav-link" href="index.php?access=admin&interface=dashboard">Panneau d'administration</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=disconnect">Se déconnecter</a>
					</li>
					<?php
				}
				else if(isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['rank']) && $_SESSION['rank'] == 'default_user')
				{
					?>
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=disconnect">Se déconnecter</a>
					</li>
					<?php
				}
				else
				{
					?>
					<li class="nav-item">
						<a class="nav-link"  data-toggle="modal" href="#ModalConnexion">Se connecter</a>
					</li>
					<li class="nav-item">
						<a class="nav-link"  data-toggle="modal" href="#ModalInscription">S'inscrire</a>
					</li>
					
					<?php
				}
				?>
			</ul>
		</div>
	</nav>
	<?php
	$menu = ob_get_clean();
	
	return $menu;
}
?>