<?php

$title = "creer un nouvel article";
ob_start();

?>

<h1>Créer un nouvel article</h1>

<form id="get-data-form" method="post" action="index.php?action=postArticle">
    <textarea id="articleContent" name="articleContent" class="tinymce"></textarea>
    <input type="submit" value="Envoyer">
</form>

<?php
$content = ob_get_clean();
require('templateAdmin.php');