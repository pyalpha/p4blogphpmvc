<?php require('App/Views/frontend/menu.php'); ?>

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
    <link href="./public/css/styles.css" rel="stylesheet">

    <title><?= $title; ?></title>

  </head>

  <body>

    <?= getMenu(); ?>

    <div class="mt-10">
      <?= $content ?>
    </div>

    

    <footer class="p-2 text-center">© Jean Forteroche - 2018</footer>

    <!-- Bootstrap core JavaScript -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="./public/js/clean-blog.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ow1bsxp3jkg1jq6mks845zw4kx2w3ffhbz6u7pkllup0n8oj"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

  </body>

</html>