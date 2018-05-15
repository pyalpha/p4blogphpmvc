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

function comment()
{
	$commentManager = new CommentManager();
	$comment = $commentManager->getComment($_GET['id']);
	require('App/Views/frontend/commentView.php');
}


function addComment($postId, $author, $comment)
{
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComment($postId, $author, $comment);
	if($affectedLines == false)
	{
		throw new Exception('Impossible d\'ajouter le commentaire !');
	}
	else
	{
		header('Location: index.php?action=post&id=' . $postId);
	}
}


function reportComment($post_id, $comment_id)
{
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->setReportedComment($comment_id);
	if($affectedLines == false)
	{
		throw new Exception('Impossible d\'envoyer le commentaire signalé en base de données. Veuillez réessayer plus tard.');
	}
	else{
		header('Location: index.php?action=post&id=' . $post_id);
	}
}

