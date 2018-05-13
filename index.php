<?php

require('App/Controllers/frontend.php');
//require __DIR__."App/Controllers/frontend.php";

try
{
    if(isset($_GET['action']))
    {
        if($_GET['action'] == 'listPosts')
        {
            listPosts();
        }
        else if ($_GET['action'] == 'post')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                post();
            }
            else 
            {
                throw new Exception("Erreur : aucun identifiant de billet envoyé");
            }
        }

        elseif($_GET['action'] == 'addComment')
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

        else if ($_GET['action'] == 'createNewArticle')
		{
			createNewArticle();
		}
		else if ($_GET['action'] == 'postArticle')
		{
			if(!empty($_POST['articleContent']))
			{
				addPost($_POST['articleContent']);
			}
			else{
				throw new Exception("Le champ n'a pas été rempli.\nL'envoi des données est impossible.");
			}
		}

        elseif($_GET['action'] == 'edit') 
        {
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                editPost();
            }
            else 
            {
                throw new Exception("Erreur : aucun identifiant de billet envoyé !\nImpossible d'editer le message.");
            }
        }

        elseif ($_GET['action'] == 'update_post') 
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                if (!empty($_POST['articleContent']) && !empty($_POST['articleTitle'])) 
                {
                    updatePost($_GET['id'], $_POST['articleContent']);
                }
                else 
                {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                }
            }
            else 
            {
                throw new Exception("Erreur : aucun identifiant de billet envoyé !\nImpossible d'editer le message.");
            }
        }


    }
    elseif (isset($_GET['acces'])) 
    {
        
        if ($_GET['acces'] == 'admin') {
            adminListPosts();
        }
        else 
        {
            throw new Exception('Erreur inconnue');
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