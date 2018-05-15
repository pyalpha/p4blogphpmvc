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

    public function getPost($postId)
    {
               $db = $this->dbConnect();
               $query = $db->prepare('SELECT * FROM posts WHERE id = :postId');
               $query = $db->bindValue(':postId', $postId, PDO::PARAM_INT);
               $query->execute();
               $post = $query->fetch();
               return $post;
    }

    public function getPostsPreviews()
    {
        $db = $this->dbConnect();
        $query = $db->query('SELECT id, LEFT(content, 250) as excerpt, creation_date FROM posts');
        return $query;
    }

    public function postPost($postContent)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('INSERT INTO posts(content, creation_date) VALUES(:postContent, NOW())');
		$query->bindValue(':postContent', $postContent, PDO::PARAM_STR);
		$affectedLines = $query->execute();
		return $affectedLines;
	}

    public function getContentOfEditedPost($postId)
    {
               $db = $this->dbConnect();
               $query = $db->prepare('SELECT id, content FROM posts WHERE id = :postId');
               $query = $db->bindValue(':postId', $postId, PDO::PARAM_INT);
               $query->execute();
               $post = $query->fetch();
               return $postContent;
    }

    public function PostUpdatedPosts($postId, $postContent)
    {
               $db = $this->dbConnect();
               $query = $db->prepare('UPDATE posts SET content =:postContent WHERE id = :postId');
               $query = $db->bindValue(':postContent', $postContent, PDO::PARAM_STR);
               $query = $db->bindValue(':postId', $postId, PDO::PARAM_INT);
               $query->execute();

               return $post;
    }

    public function deletePost($postId)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('DELETE FROM posts WHERE id = :postId');
		$query->bindValue(':postId', $postId, PDO::PARAM_INT);
		$affectedLines = $query->execute();
		return $affectedLines;
	}

}


