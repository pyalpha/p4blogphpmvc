<?php

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

function adminListPost()
{
    $postManager = new PostManager();
    $posts = $postManager->getPostsPreviews();

    require('/App/Views/backend/adminListPostsView.php');
}

function createNewArticle()
{
	require('/App/Views/backend/createNewArticleView.php');
}
function addPost($postContent)
{
	$postManager = new PostManager();
	$affectedLines = $postManager->postPost($postContent);
	if($affectedLines == false)
	{
		throw new Exception('Impossible d\'ajouter le post en base de donnée !');
	}
	else
	{
		header('Location: index.php?acces=admin');
	}
}

function editPost()
{
	$postManager = new PostManager();
	$postContent = $postManager->getContentOfEditedPost($_GET['id']);
	require('/App/Views/backend/editPostView.php');
}
function updatePost($postId, $postContent)
{
	$postManager = new PostManager();
	$affectedLines = $postManager->PostUpdatedPost($postId, $postContent);
	if ($affectedLines == false)
	{
		throw new Exception('Erreur, affected lines vaut false');
	}
	else
	{
		header('Location:index.php?acces=admin');
	}
}