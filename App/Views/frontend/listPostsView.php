<?php

$title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <h1>Mon super blog !</h1>
    <h3><?= $messageDeBienvenue ?></h3>
    
    <?php
    while ($data = $posts->fetch())
    {
    ?>
        <div class="news">
            <p>
                <?= $data['content'] ?>
            </p>
            <span>
                <?= 'Le '. htmlspecialchars($data['creation_date']) ?>	
            </span>
            <a href="?action=post&id=<?= $data['id']?>">Commentaires</a>
        </div>
    <?php 
    }
$posts->closeCursor(); // end of the query
?>
<br>
<?php
$content = ob_get_clean(); // content of the view
require('default.php'); // call the template 