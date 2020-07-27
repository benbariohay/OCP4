<?php
require_once('model/Manager.php');

class AdminManager extends Manager{

    public function logIn($pseudo, $pass)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM auth WHERE pseudo = ?");
		$req->execute(array($pseudo));
		$resultat = $req->fetch();
		
		return $resultat;
    }
    
    public function logOut()
	{        
        $_SESSION = array();
        session_destroy();
    }

}

