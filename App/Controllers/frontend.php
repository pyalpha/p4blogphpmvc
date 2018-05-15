<?php //controller front-end

//namespace App\Controllers;

require_once('App/Models/PostManager.php');
require_once('App/Models/CommentManager.php');



function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('App/Views/frontend/listPostsView.php');
    
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comment = $commentManager->getComments($_GET['id']);

    require('App/Views/frontend/postView.php');
}

function addComment()
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines == false) {
        throw new Exceptio('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id' . $postId);
    }
}

