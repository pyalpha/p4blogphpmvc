<?php
if(isset($_SESSION['id']) && isset($_SESSION['name']) && $_SESSION['rank'] == 'default_user')
{
	ob_start();?>
	<a href="index.php?action=disconnect">Se déconnecter</a>
	<?php
	$menu = ob_get_clean();
}
else if(isset($_SESSION['id']) && isset($_SESSION['name']) && $_SESSION['rank'] == 'admin')
{
	ob_start();?>
	<a href="index.php?action=disconnect">Se déconnecter</a>
	<a href="index.php?access=admin&page=dashboard">Panneau d'administration</a>
	<?php
	$menu = ob_get_clean();
}
else
{
	ob_start();
	?>
	<h3>Se connecter</h3>
	<form method="post" action="index.php?action=sign_in">
		<input type="text" name="name" placeholder="Pseudo"/><br/>
		<input type="password" name="password" placeholder="Mot de passe" /><br/><br/>
		<input type="submit" value="Se connecter">
	</form>

	<h1>S'inscrire</h1>

	<form method="post" action="index.php?action=add_user">
		<input type="text" name="name" placeholder="Pseudo" /><br/>
		<input type="email" name="email" placeholder="Email" /><br/>
		<input type="password" name="password1" placeholder="Mot de passe" /><br/>
		<input type="password" name="password2" placeholder="Mot de passe" /><br/><br/>
		<input type="submit" value="S'inscrire" />
	</form>

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
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="./public/css/clean-blog.min.css" rel="stylesheet">

    <title><?= $title; ?></title>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=posts.category&id=1">Romans</a>
            </li>
            <?php
               if (!isset($_SESSION['auth'])) {
                   echo '<li class="nav-item"> <a class="nav-link" href="index.php?p=users.login">Connexion</a> </li>';
               } else {
                   echo '<li class="nav-item"> <a class="nav-link" href="index.php?p=admin.posts.index">Admin</a> </li>';
               }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Clean Blog</h1>
              <span class="subheading">A Blog Theme by Start Bootstrap</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <?= $menu ?>
      <?= $content ?>
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