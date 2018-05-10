<?php

$title = "Article";
ob_start();

?>

<div class="new">
    <h3><?= $post['title']; ?></h3>
    <p><?= $post['content']; ?></p>
</div>

<?php 
$content = ob_get_clean();
require('default.php');