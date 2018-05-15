<?php

$title = "Modifier un article";
ob_start();

?>

<form id="get-data-form" method="post" action="index.php?access=admin&page=update_post&id=<?= $postContent['id']; ?>">
    <textarea id="articleContent" name="articleContent" class="tinymce"><?= $postContent['content']; ?></textarea>
    <input type="submit" value="Envoyer">
</form>


<?php
$content = ob_get_clean();
require('templateAdmin.php');