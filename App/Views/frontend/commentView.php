<?php

$title = 'Commentaire';
ob_start(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Commentaire</h1>
            <?= '<span><b>'.$comment['author'].'</b></span>'.' le '.$comment['comment_date_fr'];?>
        </div>
        <div class="col-md-12">
            <?= $comment['comment']; ?>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require('default.php');
