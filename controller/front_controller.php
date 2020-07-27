<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/indexView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/postView.php');
}

function PostComment($postid, $author, $comment)
{
    $commentManager = new CommentManager();

    $newcomment = $commentManager->postComment($postid, $author, $comment);
}

function Alert($commentid, $postid)
	{
        $commentManager = new CommentManager();

		$alert = $commentManager->alertComment($commentid);
		
		header('Location: index.php?action=post&id='. $postid);
		
	}

    