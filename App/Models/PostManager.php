<?php
//namespace App\Models;

require_once('Manager.php');

class PostManager extends Manager
{
	public function getPosts()
	{
		$db = $this->dbConnect();
		$query = $db->query('SELECT * FROM posts');
		return $query;
	}
	public function getNumberOfPosts()
	{
		$db = $this->dbConnect();
		$query = $db->query('SELECT * FROM posts');
		$numberOfPosts = $query->rowCount();
		return $numberOfPosts;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT * FROM posts WHERE id = :postId');
		$query->bindValue(':postId', $postId, PDO::PARAM_INT);
		$query->execute();
		$post = $query->fetch();
		return $post;
	}
	public function getPostsPreviews($depart, $postsPerPage)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT id, LEFT(content, 50) as excerpt, DATE_FORMAT(creation_date, \'%d/%m/%Y à %H:%i\') as creation_date, title as title FROM posts LIMIT :depart, :postsPerPage');
		$query->bindValue(':depart', $depart, PDO::PARAM_INT);
		$query->bindValue(':postsPerPage', $postsPerPage, PDO::PARAM_INT);
		$query->execute();
		return $query;
	}
	public function postPost($postContentTitle, $postContent)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(:postContentTitle, :postContent, NOW())');
		$query->bindValue(':postContentTitle', $postContentTitle, PDO::PARAM_STR);
		$query->bindValue(':postContent', $postContent, PDO::PARAM_STR);
		$affectedLines = $query->execute();
		return $affectedLines;
		
	}
	public function getContentOfEditedPost($postId)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT id, title, content FROM posts WHERE id = :postId');
		$query->bindValue(':postId', $postId, PDO::PARAM_STR);
		$query->execute();
		$postContent = $query->fetch();
		return $postContent;
	}
	public function PostUpdatedPost($postId, $postContent)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('UPDATE posts SET content = :postContent WHERE id = :postId');
		$query->bindValue(':postContent', $postContent, PDO::PARAM_STR);
		$query->bindValue(':postId', $postId, PDO::PARAM_INT);
		$query->execute();
		return $query;
	}
	public function deletePost($postId)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('DELETE FROM posts WHERE posts.id = :postId');
		$query->bindValue(':postId', $postId, PDO::PARAM_INT);
		$affectedLines = $query->execute();
		return $affectedLines;
	}

	public function deleteOnePost($postId)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('DELETE FROM posts WHERE posts.id = :postId');
		$query->bindValue(':postId', $postId, PDO::PARAM_INT);
		$query->execute();
		return $query;
	}

}



