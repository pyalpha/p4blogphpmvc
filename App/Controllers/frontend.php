<?php //controller front-end

//namespace App\Controllers;

require_once('App/Models/PostManager.php');
require_once('App/Models/CommentManager.php');
require_once('App/Models/UserManager.php');



function listPosts()
{
	if(isset($_SESSION['id']) && isset($_SESSION['name']))
	{
		$messageDeBienvenue = "Bonjour " . $_SESSION['name'] . " !"." <br/>Vous avez le rank ". $_SESSION['rank'];
	}
	else
	{
		$messageDeBienvenue = 'Bonjour Visiteur ! ';
		
	}
	$postManager = new PostManager();
	$posts = $postManager->getPosts();
	require('App/Views/frontend/listPostsView.php');
}
function post()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();
	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
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
	else
	{
		header('Location: index.php?action=post&id=' . $post_id);
	}
}
function signup()
{
	require('App/Views/frontend/signUpView.php');
}
function addUser()
{
	if(isset($_POST['name']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['email']))
		{
			if(!empty($_POST['name']) && !empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['email']))
			{
				if($_POST['password1'] == $_POST['password2'])
				{
					$name  = $_POST['name'];
					$password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
					$email = $_POST['email'];
					$userManager = new UserManager();
					$affectedLines = $userManager->setUser($name, $password, $email);
					if($affectedLines == false)
					{
						throw new Exception('Impossible d\'ajouter l\'utilisateur en base de données !');
					}
					else
					{
						header('Location: index.php');
					}			
				}
				else
				{
					throw new Exception('Erreur : les mots de passe ne correspondent pas.');
				} 
			}
			else
			{
				throw new Exception('Erreur. Un ou plusieurs champs n\'ont pas été remplis.');
			}
		}
	else
	{
		throw new Exception('Erreur. Un des champs est manquant.');
	}
}
function signIn()
{	
	if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['password']) && !empty($_POST['password']))
	{
		$name = $_POST['name'];
		$password = $_POST['password'];
		$userManager = new UserManager();
		$user = $userManager->getUser($name);
		$isPasswordCorrect = password_verify($password, $user['password']);
		if($isPasswordCorrect)
		{
			session_start();
			$_SESSION['id'] = $user['id'];
			$_SESSION['name'] = $name;
			$_SESSION['rank'] = $user['rank'];
			header('Location: index.php');
		}
		else
		{
			throw new Exception('Identifiant ou mot de passe incorrect.');
		}
	}
	else
	{
		throw new Exception('Erreur : Vous devez remplir tous les champs.');
	}
}
function disconnect()
{
	session_start();
	if(isset($_SESSION['id']) && isset($_SESSION['name']))
	{
		// Suppression des variables de session et de la session
		$_SESSION = array();
		session_destroy();
		// Suppression des cookies de connexion automatique
		setcookie('login', '');
		setcookie('pass_hash', '');
		header('Location: index.php');
	}
	else
	{
		throw new Exception('Erreur : vous êtes déjà déconnecté.');
	}
}