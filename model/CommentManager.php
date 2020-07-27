<?php
require_once('model/Manager.php');

class CommentManager extends Manager{

    public function getComments($postId){
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, alert,DATE_FORMAT(comment_date, \'%d/%m/%Y - \') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
    
        return $comments;
    }
    
    public function postComment($postid, $author, $comment){
        $db = $this->dbConnect();
        $reqComment = $db->prepare('INSERT INTO comments (post_id, author, comment, comment_date, alert) VALUES(?, ?, ?, NOW(), 0)');
        $reqComment->execute(array($postid, $author, $comment));
    
        return $reqComment;
    }

    public function alertComment($commentid)
	{
		$db = $this->dbConnect();
		$reqAlert = $db->prepare('UPDATE comments SET alert= "1" WHERE id= ? AND alert= "0"');
		$reqAlert->execute(array($commentid));
		
		return $reqAlert;
    }
    
    public function alertList()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, comment, author, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE alert= "1"');
		
		return $req;
    }
    
    public function deleteComment($commentid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id= ?');
		$req->execute(array($commentid));

		return $req;
    }

    public function deletePostComments($commentpostid)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE post_id= ?');
		$req->execute(array($commentpostid));

		return $req;
    }
    
    public function validateComment($commentid)
    {
        $db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET alert= "0" WHERE id= ? AND alert = "1"');
        $req->execute(array($commentid));
        
        return $req;
    }

}