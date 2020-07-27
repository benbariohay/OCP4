<?php
require('controller/front_controller.php');
require('controller/back_controller.php');

try { // FRONTEND Conditions -------------------------------------------------------------
	if (isset($_GET['action'])) { 
		if ($_GET['action'] == 'listPosts') {
			listPosts();
		}
		elseif ($_GET['action'] == 'post') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				post();
			}
			else {
				throw new Exception('wrongidpost');
			}
		}
		elseif ($_GET['action'] == 'postcomment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (!empty($_POST['author']) && !empty($_POST['comment'])) {
					PostComment($_GET['id'], $_POST['author'], $_POST['comment']);
				}
			}
			else {
				throw new Exception('wrongidpost');
			}
		}
		// BACKEND & Login/Logout Conditions -------------------------------------------------------------
		elseif($_GET['action'] == 'loginview'){
			session_start();
			if (isset($_SESSION['pseudo']) && isset($_SESSION['id'])){
				BackHomeView();
			}
			else{
				LoginView();
			}
		}
			// ---- Login 
		elseif ($_GET['action'] == 'logged') {
			Logged();
		}
		 // ---- Logout
		elseif($_GET['action'] == 'logout') {
			session_start();
			if(isset($_SESSION['pseudo']) && isset($_SESSION['id'])){
				LogOut();
			}
			else {
				throw new Exception('limitedaccess');
			}	
		} // ---- Show list posts
		elseif($_GET['action'] == 'chapters'){
			session_start();
			if(isset($_SESSION['pseudo']) && isset($_SESSION['id'])){
				BackListPosts();
			}
			else {
				throw new Exception('limitedaccess');
			}
		} // ---- Report a comment
		elseif($_GET['action'] == 'alert') {
			if(isset($_GET['commentid']) && isset($_GET['id'])){
				Alert($_GET['commentid'], $_GET['id']);
			}
			else {
				throw new Exception('wrongidpost');
			}	
		} // ---- Show reported comments
		elseif($_GET['action'] == 'alertlist'){
			session_start();
			if(isset($_SESSION['pseudo']) && isset($_SESSION['id'])){
				AlertList();
			}
			else {
				throw new Exception('limitedaccess');
			}
		} // ---- Delete a comment
		elseif($_GET['action'] == 'deletecom') {
			session_start();
			if(isset($_SESSION['pseudo']) && isset($_SESSION['id'])){
				if(isset($_GET['commentid']) && $_GET['commentid'] > 0){
					DeleteComment($_GET['commentid']);
				}
				else{
					throw new Exception('managecom');
				}
			}
			else {
				throw new Exception('limitedaccess');
			}
		} // ---- Unreport comment
		elseif($_GET['action'] == 'validatecom') {
			session_start();
			if(isset($_SESSION['pseudo']) && isset($_SESSION['id'])){
				if(isset($_GET['commentid']) && $_GET['commentid'] > 0){
					ValidateComment($_GET['commentid']);
				}
				else{
					throw new Exception('managecom');
				}
			}
			else {
				throw new Exception('limitedaccess');
			}
		} // ---- Delete a post
		elseif($_GET['action'] == 'deletepost') {
			session_start();
			if(isset($_SESSION['pseudo']) && isset($_SESSION['id'])){
				if(isset($_GET['postid']) && $_GET['postid'] > 0){
					DeletePost($_GET['postid']);
					DeletePostComments($_GET['postid']);
				}
				else{
					throw new Exception('managepost');
				}
			}
			else {
				throw new Exception('limitedaccess');
			}
		} // ---- Show publishing post view
		elseif($_GET['action'] == 'writepost'){
			session_start();
			if (isset($_SESSION['pseudo']) && isset($_SESSION['id'])){
				WritePost();
			}
			else{
				throw new Exception('limitedaccess');
			}
		} // ---- Publish a post
		elseif($_GET['action'] == 'createpost'){
			session_start();
			if(isset($_SESSION['pseudo']) && isset($_SESSION['id'])) {
				if(!empty($_POST['title']) && !empty($_POST['content'])){
					CreatePost($_POST['title'], $_POST['content']);
				}
			}
			else{
				throw new Exception('limitedaccess');
			}
		} // ---- Show updating post view
		elseif($_GET['action'] == 'updatedir'){
			session_start();
			if(isset($_SESSION['pseudo']) && isset($_SESSION['id'])){
				UpdateDir($_GET['postid']);
			}
			else {
				throw new Exception('limitedaccess');
			}
		} // ---- Update a post
		elseif($_GET['action'] == 'updatepost'){
			session_start();
			if(isset($_SESSION['pseudo']) && isset($_SESSION['id'])) {
				if(!empty($_POST['title']) && !empty($_POST['content'])){
					UpdatePost($_POST['title'], $_POST['content'], $_GET['postid']);
				}	
			}
			else{
				throw new Exception('limitedaccess');
			}
		}
	}
	else {
		listPosts();
	}
}
catch(Exception $e) { 
	$errorMessage = $e->getMessage();
	require('view/errorView.php');	
}