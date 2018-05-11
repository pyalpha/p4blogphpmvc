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

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
		$query = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date)
		VALUES (:postId, :author, :comment, NOW())');
		$query->bindValue(':postId', $postId, PDO::PARAM_STR);
		$query->bindValue(':author', $author, PDO::PARAM_STR);
		$query->bindValue(':comment', $comment, PDO::PARAM_STR);
		$affectedLines = $query->execute();
		return $affectedLines;
        
    }
}
