<?php

session_start();

require('App/Controllers/frontend.php');
require('App/Controllers/backend.php');
//require __DIR__."App/Controllers/frontend.php";

try
{
	if(isset($_GET['action']))
	{
		if($_GET['action'] == 'listPosts')
		{
			listPosts();
		}
		else if($_GET['action'] == 'post')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0)
			{
				post();
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
				if(!empty($_POST['author']) && !empty($_POST['comment']))
				{
					addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				}
				else
				{
					throw new Exception('Erreur : tous les champs ne sont pas remplis !');
				}
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
		else if($_GET['action'] == 'sign_up')
		{
			signUp();
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
	}
	else if(isset($_GET['access']))
	{
		if($_GET['access'] == 'admin')
		{
				if($_GET['page'] == 'dashboard')
				{
					adminListPosts();
				}
				else if ($_GET['page'] == 'createNewArticle')
				{
					createNewArticle();
				}
				else if ($_GET['page'] == 'postArticle')
				{
					if(!empty($_POST['articleContent']))
					{
						addPost($_POST['articleContent']);
					}
					else{
						throw new Exception("Le champ n'a pas été rempli.\nL'envoi des données est impossible.");
					}
				}
				else if($_GET['page'] == 'edit')
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
				else if($_GET['page'] == 'update_post')
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
				else if ($_GET['page'] == 'delete_post')
				{
					
					if(isset($_POST['checked_post_id']) && !empty($_POST['checked_post_id']))
						{
							$checked_posts_id = $_POST['checked_post_id'];
							removePost($checked_posts_id);
						}
						else
						{
							echo "Erreur."."<br/>Vous n'avez pas coché de checkbox";
						}
				}
				else if ($_GET['page'] == 'reported_comments')
				{
					listReportedComments();
				}
				else if($_GET['page'] == 'delete_reported_comment')
				{
					if(isset($_POST['checked_comment_id']) && !empty($_POST['checked_comment_id']))
					{
						removeComment($_POST['checked_comment_id']);
					}
				}
				else
				{
					throw new Exception("Erreur 404. Cette page n'existe pas.");
				}
		}
		else
		{
			throw new Exception("Paramètres dans l'URL incorrects.");
		}
	}
	else
	{
		listPosts();
	}
}
catch(Exception $e)
{
	echo '' . $e->getMessage();
}