<?php //controller front-end

//namespace Controllers;

require('vendor/autoload.php');


require_once('App/Models/PostManager.php');
require_once('App/Models/CommentManager.php');
require_once('App/Models/UserManager.php');



function getIndexView()
{
	if(isset($_SESSION['id']) && isset($_SESSION['name']))
	{
		$messageDeBienvenue = "Bienvenue sur mon site,  " . $_SESSION['name'] . " !";
	}
	else
	{
		$messageDeBienvenue = 'Bienvenue sur mon site, Visiteur ! ';
		
	}
	require('App/Views/frontend/indexView.php');
}
function listPosts($pageCourante)
{
	$postsPerPage = 5;
	$depart = ($pageCourante-1)*$postsPerPage;
	$postManager = new PostManager();
	$posts = $postManager->getPostsPreviews($depart, $postsPerPage);
	$numberOfPosts = $postManager->getNumberOfPosts();
	$nombreDePages = ceil($numberOfPosts/$postsPerPage); 
	if(isset($_GET['page']) && $_GET['page'] > $nombreDePages)
	{
		header('Location: index.php?action=listPosts');
	}
	
	$commentManager = new CommentManager(); // using this variable to call a method in the view
	require('App/Views/frontend/listPostsView.php');
}
function post($pageCourante)
{
	$commentsPerPage = 5;
	$depart = ($pageCourante-1)*$commentsPerPage;
	$postManager = new PostManager();
	$commentManager = new CommentManager();
	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id'], $depart, $commentsPerPage);
	$numberOfComments = $commentManager->getNumberOfComments($_GET['id']);
	$nombreDePages = ceil($numberOfComments/$commentsPerPage);
	require('App/Views/frontend/postView.php');
}
function comment()
{
	$commentManager = new CommentManager();
	$comment = $commentManager->getComment($_GET['id']);
	require('App/Views/frontend/commentView.php');
}
function addComment()
{
	if(isset($_SESSION['name']) && isset($_POST['comment']) && !empty($_POST['comment']))
	{
		$comment = htmlspecialchars($_POST['comment']);
		$commentManager = new CommentManager();
		$affectedLines = $commentManager->postComment($_GET['id'], $_SESSION['name'], $comment);
		if($affectedLines == false)
		{
			throw new Exception('Impossible d\'ajouter le commentaire !');
		}
		else
		{
			header('Location: index.php?action=post&id=' . $_GET['id']);
		}
	}
	else
	{
		throw new Exception('Erreur : tous les champs ne sont pas remplis !');
	}
}
function reportComment($post_id, $comment_id)
{
	if(isset($_POST['reason']) && !empty($_POST['reason']))
	{
		$reason = htmlspecialchars($_POST['reason']);
		$commentManager = new CommentManager();
		$theCommentStillExists = $commentManager->checkIfTheCommentStillExists($comment_id);
		if($theCommentStillExists)
		{
			$theUserHasAlreadyReportedThisComment = $commentManager->checkIfTheUserHasAlreadyReportedThisComment($_SESSION['name'], $comment_id);
			if($theUserHasAlreadyReportedThisComment)
			{
				throw new Exception("Vous avez déjà signalé ce commentaire ! ");
			}
			else
			{
				$affectedLines = $commentManager->setReportedComment($comment_id, $_SESSION['name'], $reason);
				if($affectedLines == false)
				{
					throw new Exception('Impossible d\'envoyer le commentaire signalé en base de données. Veuillez réessayer plus tard.');
				}
				else
				{
					header('Location: index.php?action=post&id=' . $post_id);
				}
			}		
		}
		else
		{
			throw new Exception("Ce commentaire a déjà été supprimé par un Administrateur ! Merci de votre signalement.");
		}
	}
	else
	{
		throw new Exception("Erreur. Vous devez remplir les champs du formulaire !");
	}
}
function addUser()
{
	if(isset($_POST['name']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['email']))
		{
			$userName = htmlspecialchars($_POST['name']);
			if(!empty($_POST['name']) && !empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['email']))
			{
				$userManager = new UserManager();
				$theUserAlreadyExists = $userManager->checkIfTheUserAlreadyExists($userName);
				if($theUserAlreadyExists)
				{
					throw new Exception("Erreur : ce pseudo est déjà pris !");
				}
				else
				{
					if($_POST['password1'] == $_POST['password2'])
					{
						$password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
						$email = $_POST['email'];
						$userManager = new UserManager();
						$affectedLines = $userManager->setUser($userName, $password, $email);
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
		$name = htmlspecialchars($_POST['name']);
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

