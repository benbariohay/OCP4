<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');

function LoginView()
	{
		require('view/loginView.php');
	}

function LogIn($pseudo, $pass)
{
    $adminmanager = new AdminManager();
    $resultat = $adminmanager->logIn($pseudo, $pass);

        if($resultat){
            $ispasscorrect = password_verify($_POST['pass'], $resultat['pass']);

            if($ispasscorrect){
                session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['pseudo'] = $resultat['pseudo'];
                
                header('Location: index.php?action=logged');
            }
            else {
                $_SESSION['errors'] = array("Identifiant ou mot de passe incorrect !");
                header("Location: index.php?action=loginview");
            }
        }
        else {
            $_SESSION['errors'] = array("Identifiant ou mot de passe incorrect !");
            header("Location: index.php?action=loginview");
            // $erreur = "ID ou MDP incorrect";
        }      
        
}

function Logged()
{
    require('view/back_homeView.php');
}

function LogOut()
	{
        $adminmanager = new AdminManager();
		$logout = $adminmanager->logOut();

		require('view/logoutView.php');
	}

function BackListPosts()
	{
        $postManager = new PostManager();
		$listposts = $postManager->getPosts();

		require('view/back_listpostView.php');
	}

function BackHomeView()
	{
		require('view/back_homeView.php');
    }
    

function AlertList()
	{
        $commentManager = new CommentManager();
		$alertlist = $commentManager->alertList();

		require('view/back_reportedComment.php');
    }
    
function DeleteComment($commentid)
    {
        $commentManager = new CommentManager();
        $deletecom = $commentManager->deleteComment($commentid);
        $alertlist = $commentManager->alertList();

        require('view/back_reportedComment.php');
    }

function ValidateComment($commentid)
    {
        $commentManager = new CommentManager();
        $validatecomment = $commentManager->validateComment($commentid);
        $alertlist = $commentManager->alertList();

        require('view/back_reportedComment.php');
    }

function DeletePost($postid)
    {
        $postManager = new PostManager();
        $deletepost = $postManager->deletePost($postid);  
    }

function DeletePostComments($commentpostid)
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $deletepostcomments = $commentManager->deletePostComments($commentpostid);

        $listposts = $postManager->getPosts();

        require('view/back_listpostView.php');
    }

function WritePost()
    {
        require('view/back_createPost.php');
    }

function CreatePost($title, $content)
    {
        $postManager = new PostManager();
        $newpost = $postManager->createPost($title, $content);
        $listposts = $postManager->getPosts();
    }

function UpdateDir($postId)
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);

        require('view/back_updatePost.php');
    }

function UpdatePost($title, $content, $postid)
    {
        $postManager = new PostManager();
        $uppost = $postManager->updatePost($title, $content, $postid);
        $listposts = $postManager->getPosts();

    }

