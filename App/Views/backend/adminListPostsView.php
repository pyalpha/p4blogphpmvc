<?php

$title = "Administration du Blog";

ob_start() ?>
<h1>Administration</h1>
<a href="index.php?action=createNewArticle">Créer un article</a>
<?php

while($post = $posts->fetch())
{
    ?>
    <div class="news">
        <?= $post['content']; ?>
        <span><?= 'Le ' . $post['creation_date'] ?> </span>
        <a href="index.php?action=edit&id=<?= $post['id']; ?>">Modifier</a>
    </div>

    <?php
}
$posts->closeCursor(); // fin de query
$content = ob_get_clean();; // contenu du view
require('templateAdmin.php'); //appelle à la template admin

?>