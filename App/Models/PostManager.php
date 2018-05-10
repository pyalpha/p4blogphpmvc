<?php

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
}


