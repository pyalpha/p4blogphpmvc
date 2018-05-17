<?php
//namespace App\Models;

class CommentManager extends Manager
{
	public function getComments($postId, $depart, $commentsPerPage)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %H:%i\') AS comment_date_fr FROM comments WHERE post_id = :postId ORDER BY comment_date LIMIT :depart, :commentsPerPage');
		$query->bindValue(':postId', $postId, PDO::PARAM_INT);
		$query->bindValue(':depart', $depart, PDO::PARAM_INT);
		$query->bindValue(':commentsPerPage', $commentsPerPage, PDO::PARAM_INT);
		$query->execute();
		return $query;
	}
	public function getNumberOfComments($postId)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT * from comments WHERE post_id = :postId');
		$query->bindValue(':postId', $postId, PDO::PARAM_INT);
		$query->execute();
		$numberOfComments = $query->rowCount();
		return $numberOfComments;
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
	public function countComments($postId)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT COUNT(*) as COUNT FROM comments WHERE post_id = :postId');
		$query->bindValue(':postId', $postId, PDO::PARAM_INT);
		$query->execute();
		$comments = $query->fetch();
		return $comments;
	}
	public function postComment($postId, $author, $comment) // set
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
	public function setReportedComment($comment_id, $user, $reason)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('INSERT INTO reported_comments(comment_id, report_date, reported_by, reason) VALUES(:comment_id, NOW(), :user, :reason)');
		$query->bindValue(':comment_id', $comment_id, PDO::PARAM_INT);
		$query->bindValue(':user', $user, PDO::PARAM_STR);
		$query->bindValue(':reason', $reason, PDO::PARAM_STR);
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
	public function deleteComment($commentId) // delete reported comment
	{
		$db = $this->dbConnect();
		$query = $db->prepare('DELETE FROM comments WHERE id = :commentId');
		$query->bindValue(':commentId', $commentId, PDO::PARAM_INT);
		$affectedLines = $query->execute();
		return $affectedLines;
	}
	public function deleteCommentsOfAPost($postId) // when you delete a post, call this method to delete all its comments if there's any
	{
		$db = $this->dbConnect();
		$query = $db->prepare('DELETE FROM comments WHERE post_id = :postId');
		$query->bindValue(':postId', $postId, PDO::PARAM_INT);
		$affectedLines = $query->execute();
		return $affectedLines;
	}
}
