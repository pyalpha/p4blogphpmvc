<?php

$title = "Administration du Blog";

ob_start() ?>
<h1>Administration</h1>
<a href="index.php?action=createNewArticle">Créer un article</a>
<form method="POST" action="index.php?action=delete_post">
<?php

while($post = $posts->fetch())
{
    ?>
    <div class="news">
        <?= $post['content']; ?><input type="checkbox" name="checked_post_id[]" value="<?= $post['id'], ?>">
        <span><?= 'Le ' . $post['creation_date'] ?> </span>
        <a href="index.php?action=edit&id=<?= $post['id']; ?>">Modifier</a>
    </div>

    <?php
}
?>
        <input type="submit" value="Effacer la selection">
</form>
<?php
$posts->closeCursor(); // fin de query
$content = ob_get_clean();; // contenu du view
require('templateAdmin.php'); //appelle à la template admin

?>