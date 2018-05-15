<?php //controller back-end

//namespace App\Controllers;

require_once('App/Models/PostManager.php');
require_once('App/Models/CommentManager.php');

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
		header('Location: index.php?acces=admin&page=dashboard');
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
		throw new Exception('Erreur, lors de la mise à jour du post en base de données.');
	}
	else
	{
		header('Location:index.php?acces=admin&page=dashboard');
	}
}

function removePost($checked_posts_id)
{
	$postManager = new PostManager();
	foreach ($checked_posts_id as $postId)
	 {
		$affectedLines = $postManager->deletePost($postId);
		if ($affectedLines == false)
		{
			throw new Exception('Erreur lors de la supression du ou des posts en base de données.');
		}
		else
		{
			header('Location:index.php?acces=admin&page=dashboard');
		}
	}
}

function listReportedComments()
{
	$commentManager = new CommentManager;
	$query = $commentManager->getReportedComments();
	require('view/backend/listReportedCommentsView.php');
}


function removeComment($checked_comments_id)
{
	$commentManager = new CommentManager();
	foreach ($checked_comments_id as $comment_id)
	 {
		$affectedLines = $commentManager->deleteComment($comment_id);
		if ($affectedLines == false)
		{
			throw new Exception('Erreur lors de la supression du ou des commentaires en base de données.');
		}
		else
		{
			header('Location:index.php?access=admin&page=reported_comments');
		}
	}
}