<?php

$title = "Article";
ob_start();

?>

<div class="news">
    
    <?= $post['content']; ?>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&id=<?= $post['id']; ?>">
     <div>
         <label for="author">Auteur</label><br />
         <input type="text" id="author" name="author" />
     </div>
     <div>
         <label for="comment">Commentaire</label><br />
         <textarea id="comment" name="comment"></textarea>
     </div>
     <div>
         <input type="submit" />
     </div>
</form>

<?php
while ($comment = $comments->fetch()) {
    ?>
    <p><?= $comment['author'].' Le ' .$comment['comment_date_fr']; ?>
    <br/>
    <?= $comment['comment']; ?>
    <form method="post" action="index.php?action=report_comment&post_id=<?=$_GET['id'];?>&comment_id=<?=$comment['id'];?>">
        <input type="submit" value="Signaler ce commentaire" />
    </form>

    </p>
    
    <?php
}
$comments->closeCursor();
$content = ob_get_clean();
require('default.php');

?>