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
				throw new Exception('Erreur : aucun identifiant de billet envoyé !');
			}
        }

    }
    elseif (isset($_GET['admin'])) 
    {
        adminListPosts();
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