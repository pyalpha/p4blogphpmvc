<?php

$title = 'Accueil';
ob_start();?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('public/img/alaska1.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Jean FORTEROCHE</h1>
              <span class="subheading">BILLET SIMPLE POUR L'ALASKA</span>
              <button><a href="index.php?action=listPosts" class="btn btnConsulterPage">Lire le roman</a></button>
            </div>
          </div>
        </div>
      </div>
</header>

<?php
$content = ob_get_clean();
require('default.php');