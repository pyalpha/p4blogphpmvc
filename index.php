<?php

require('App/Controllers/frontend.php');

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