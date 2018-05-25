<?php

use Controllers\getIndexView;

session_start();

require('App/Controllers/frontend.php');
require('App/Controllers/backend.php');
//require __DIR__."App/Controllers/frontend.php";

try
{
	if(isset($_GET['action'])) // isset get action
	{
		if($_GET['action'] == 'listPosts')
		{
			if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0)
			{
				$pageCourante = $_GET['page'];
			}
			else
			{
				$pageCourante = 1;
			}
			listPosts($pageCourante);
		}
		else if($_GET['action'] == 'post')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0)
			{
				if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0)
				{
					$pageCourante = $_GET['page'];
				}
				else
				{
					$pageCourante = 1;
				}
				post($pageCourante);
			}
			else
			{
				throw new Exception('Erreur : aucun identifiant de billet envoyé !');
			}
		}
		else if($_GET['action'] == 'comment')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0)
			{
				comment();
			}
			else
			{
				throw new Exception('Erreur : Aucun identifiant de commentaire envoyé !');
			}
		}
		else if($_GET['action'] == 'addComment')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0)
			{
				addComment();
			}
			else
			{
				throw new Exception('Erreur : identifiant de billet incorrect !');
			}
		}
		else if($_GET['action'] == 'report_comment')
		{
			if(isset($_GET['post_id']) && $_GET['post_id'] > 0)
			{
				if(isset($_GET['comment_id']) && $_GET['comment_id'] > 0)
				{
					reportComment($_GET['post_id'], $_GET['comment_id']);
				}
				else
				{
					throw new Exception('Aucun identifiant de commentaire envoyé. Impossible d\'effectuer l\'action demandée.');
				}
			}
			else{
				throw new Exception('Aucun identifiant d\'article envoyé. Impossible d\'effectuer l\'action demandée.');
			}
		}
		else if($_GET['action'] == 'forgotten_password')
		{
			getForgottenPasswordView();
		}
		else if($_GET['action'] == 'send_email')
		{
			sendEmail();
		}
		else if($_GET['action'] == 'reset_password')
		{
			if(isset($_GET['token']) && !empty($_GET['token']))
			{
				getResetPasswordView();
			}
			else
			{
				throw new Exception("Erreur. Token manquant.");
			}
			
		}
		else if($_GET['action'] == 'update_password')
		{
			if(isset($_GET['token']) && !empty($_GET['token']))
			{
				updatePassword();
			}
			else
			{
				throw new Exception("Erreur. Token manquant.");
			}	
		}
		else if($_GET['action'] == 'add_user')
		{
			addUser();	
		}
		else if ($_GET['action'] == 'sign_in')
		{
			signIn();
		}
		else if($_GET['action'] == 'disconnect')
		{
			disconnect();
		}
	} // /isset get action
	else if(isset($_GET['interface'])) // isset get interface
	{
			if($_GET['interface'] == 'dashboard')
		{
			if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0)
			{
				$_GET['page'] = intval($_GET['page']);
				$pageCourante = $_GET['page'];
			}
			else
			{
				$pageCourante = 1;
			}
			adminListPosts($pageCourante);
		}
		else if ($_GET['interface'] == 'createNewArticle')
		{
			createNewArticle();
		}
		else if ($_GET['interface'] == 'postArticle')
		{
			if(!empty($_POST['articleContent'] && $_POST['articleContentTitle']))
			{
				addPost();
			}
			else{
				throw new Exception("Le champ n'a pas été rempli.\nL'envoi des données est impossible.");
			}
		}
		else if($_GET['interface'] == 'edit')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0)
			{
				editPost();
			}
			else
			{
				throw new Exception("Erreur : aucun identifiant de billet envoyé !\nImpossible d'éditer le message.");
			}
		}
		else if($_GET['interface'] == 'update_post')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0)
			{
				if(!empty($_POST['articleContent']))
				{
					updatePost($_GET['id'], $_POST['articleContent']);
					
				}
				else
				{
					throw new Exception('Erreur : tous les champs ne sont pas remplis.');
				}
			}
			else
			{
				throw new Exception("Erreur : aucun identifiant de billet envoyé !\nImpossible d'éditer le message.");
			}
		}

		else if($_GET['interface'] == 'delete')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0)
			{
				removeOnePost();
			}
			else
			{
				throw new Exception("Erreur : aucun identifiant de billet envoyé !\nImpossible de supprimer l'article.");
			}
		}

		else if ($_GET['interface'] == 'delete_post')
		{
			
			if(isset($_POST['checked_post_id']) && !empty($_POST['checked_post_id']))
				{
					$checked_posts_id = $_POST['checked_post_id'];
					removePost($checked_posts_id);
				}
				else
				{
					throw new Exception("Erreur."."<br/>Vous devez sélectionner au moins un élément.");
				}
		}
		else if ($_GET['interface'] == 'reported_comments')
		{
			if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0)
			{
				$_GET['page'] = intval($_GET['page']);
				$pageCourante = $_GET['page'];
			}
			else
			{
				$pageCourante = 1;
			}
			listReportedComments($pageCourante);
		}
		else if($_GET['interface'] == 'delete_reported_comment')
		{
			if(isset($_POST['checked_comment_id']) && !empty($_POST['checked_comment_id']))
			{
				removeComment($_POST['checked_comment_id']);
			}
			else
			{
				throw new Exception("Erreur."."<br/>Vous devez sélectionner au moins un élément.");
			}
		}
		else
		{
			throw new Exception("Erreur 404. Cette page n'existe pas.");
		}
	} // /isset get interface
	else
	{
		getIndexView();
	}
	
}
catch(Exception $e)
{
	echo '' . $e->getMessage();
}