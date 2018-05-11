<?php

$title = "Administration du Blog";

ob_start() ?>
<h1>Administration</h1>
<?php

while($post = $posts->fetch())
{
    ?>
    <div class="news">
        <h3><?= htmlspecialchars($post['title']) ?></h3>
        <p><?= htmlspecialchars($post['content']) ?></p>
        <span><?= htmlspecialchars($post['creation_date']) ?></span>
        <a href="#">Modifier</a>
    </div>

    <?php
}
$posts->closeCursor(); // fin de query
$content = ob_get_clean();; // contenu du view
require('templateAdmin.php'); //appelle à la template admin

?>