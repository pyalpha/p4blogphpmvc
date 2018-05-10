<?php

require_once('App/Models/PostManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('App/Views/frontend/listPostView.php');
}

function post()
{
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);

    require('App/Views/frontend/postView.php');
}