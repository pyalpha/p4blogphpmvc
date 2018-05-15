<?php
//namespace App\Models;

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
    
	public function getComment($comment_id)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT * FROM comments WHERE id = :comment_id');
		$query->bindValue(':comment_id', $comment_id, PDO::PARAM_INT);
		$query->execute();
		$comment = $query->fetch();
		return $comment;
    }
    
	public function postComment($postId, $author, $comment) // set
	{
		$db = $this->dbConnect();
		$query = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(:postId, :author, :comment, NOW())');
		$query->bindValue(':postId', $postId, PDO::PARAM_STR);
		$query->bindValue(':author', $author, PDO::PARAM_STR);
		$query->bindValue(':comment', $comment, PDO::PARAM_STR);
		$affectedLines = $query->execute();
		return $affectedLines;
    }
    
	public function setReportedComment($comment_id)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('INSERT INTO reported_comments(comment_id, report_date) VALUES(:comment_id, NOW())');
		$query->bindValue(':comment_id', $comment_id, PDO::PARAM_INT);
		$affectedLines = $query->execute();
		return $affectedLines;
    }
    
	public function getReportedComments()
	{
		$db = $this->dbConnect();
		$query = $db->query('SELECT * FROM reported_comments INNER JOIN comments ON reported_comments.comment_id = comments.id');
		$query->execute();
		return $query;
    }
    
	public function deleteComment($checked_comments_id)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('DELETE FROM comments WHERE id = :checked_comments_id');
		$query->bindValue(':checked_comments_id', $checked_comments_id, PDO::PARAM_INT);
		$affectedLines = $query->execute();
		return $affectedLines;
	}
}