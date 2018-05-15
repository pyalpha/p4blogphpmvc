<?php

$title = 'Commentaire';
ob_start(); ?>
<h1>Commentaire</h1>
<?= $comment['author'] . ' : '. $comment['comment']; ?>


<?php
$content = ob_get_clean();
require('default.php');
