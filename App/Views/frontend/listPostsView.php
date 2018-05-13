<?php

$title = 'Jean Forteroche';

?>

<?php ob_start(); ?>
        <h1>Le blog de Jean</h1>
        <?php 
        while ($data = $posts->fetch()) {
            ?>
                 <div class="new">
                     <p>
                         <?= $data['content'];  ?>
                     </p>
                     <span>
                         <?= htmlspecialchars($data['creation_date']) ?>
                     </span>
                     <a href="?action=post&id=<?= $data['id']; ?>">Commentaires</a>
                 </div>
            <?php
        }
$posts->closeCursor(); // fin de la requette

$content = ob_get_clean(); //le contenu du view
require('default.php'); // appele à la template gabarit

?>