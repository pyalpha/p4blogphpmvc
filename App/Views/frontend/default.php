<?php
if(isset($_SESSION['id']) && isset($_SESSION['name']) && $_SESSION['rank'] == 'default_user')
{
	ob_start();?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<a class="navbar-brand" href="#"><span class="blue">J</span>ean <span class="purple">F</span>orteroche</a>
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
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=disconnect">Se déconnecter</a>
					</li>
				</ul>
			</div>
		</nav>
	<?php
	$menu = ob_get_clean();
}
else if(isset($_SESSION['id']) && isset($_SESSION['name']) && $_SESSION['rank'] == 'admin')
{
	ob_start();?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<a class="navbar-brand" href="#"><span class="blue">J</span>ean <span class="purple">F</span>orteroche</a>
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
					<li class="nav-item">
						<a class="nav-link" href="index.php?access=admin&interface=dashboard">Panneau d'administration</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=disconnect">Se déconnecter</a>
					</li>
				</ul>
			</div>
		</nav>
	<?php
	$menu = ob_get_clean();
}
else
{
	ob_start();
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<a class="navbar-brand" href="#"><span class="blue">J</span>ean <span class="purple">F</span>orteroche</a>
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
					<li class="nav-item">
						<a class="nav-link"  data-toggle="modal" href="#ModalConnexion">Se connecter</a>
					</li>
					<li class="nav-item">
						<a class="nav-link"  data-toggle="modal" href="#ModalInscription">S'inscrire</a>
					</li>
				</ul>
			</div>
		</nav>

			<!-- Modal Inscription -->
	<div class="modal fade" id="ModalInscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="index.php?action=add_user">
						<div class="form-group">
							<input type="text" name="name" class="form-control" placeholder="Pseudo">
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" name="password1" class="form-control" placeholder="Mot de passe">
						</div>
						<div class="form-group">
							<input type="password" name="password2" class="form-control" placeholder="Mot de passe">
						</div>
						<button type="submit" class="btn btn-primary">S'inscrire</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Connexion -->
	<div class="modal fade" id="ModalConnexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="index.php?action=sign_in">
						<div class="form-group">
							<input type="text" name="name"  class="form-control" placeholder="Pseudo"/>
						</div>
						<div class="form-group">
							<input type="password" name="password"  class="form-control" placeholder="Mot de passe" />
						</div>
						<button type="submit" class="btn btn-primary">Se connecter</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	$menu = ob_get_clean();
}
?>

<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Blog">
    <meta name="author" content="RAMDI">



    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="./public/css/styles.css" rel="stylesheet" type="text/css" >

    <title><?= $title; ?></title>

  </head>

  <body>

    <!-- Main Content -->
    <div class="container">
      <?= $menu ?>
      <div class="mt-10">
        <?= $content ?>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; RAMDI.FR 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="./public/js/clean-blog.min.js"></script>

  </body>

</html>