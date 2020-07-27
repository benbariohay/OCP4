<?php 
require_once('model/Manager.php');

class PostManager extends Manager
{
    public function getPosts() {
    
        $db = $this->dbConnect();
    
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');
    
        return $req;
    }         
    
    public function getPost($postId){
        $db = $this->dbConnect();
        
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
    
        return $post;
    }

    public function deletePost($postId){
        $db = $this->dbConnect();
        
        $req = $db->prepare('DELETE FROM posts WHERE id= ?');
        $req->execute(array($postId));
    
        return $req;
    }

    public function createPost($title, $content){
        $db = $this->dbConnect();
        
        $req = $db->prepare('INSERT INTO posts (title, content, creation_date) VALUES(?, ?, NOW())');
        $req->execute(array($title, $content));
    
        return $req;
    }

    public function updatePost($title, $content, $postid){
        $db = $this->dbConnect();
        
        $req = $db->prepare('UPDATE posts SET title = ?, content = ?, creation_date = NOW() WHERE id = ?');
        $req->execute(array($title, $content, $postid));
    
        return $req;
    }

}