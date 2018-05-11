<?php

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = :postId ORDER BY comment_date DESC LIMIT 5');
        $query->bindValue(':postId', $postId, PDO::PARAM_INT);
        $query->execute();

        return $query;
    }
}
