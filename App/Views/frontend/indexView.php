<?php

$title = 'Accueil';
ob_start();?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Clean Blog</h1>
              <span class="subheading">A Blog Theme by Start Bootstrap</span>
              <a href="index.php?action=listPosts" class="btn btnConsulterPage">Consulter la page</a>
            </div>
          </div>
        </div>
      </div>
</header>

<?php
$content = ob_get_clean();
require('default.php');