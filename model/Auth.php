<?php
require_once('model/Manager.php');

class Auth extends Manager{

    public function isAuth($pseudo, $pass){

        $db = $this->dbConnect();
        $authReq = $db->prepare('SELECT * FROM auth WHERE pseudo = ?');
        $authReq->execute(array($pseudo));
        $auth = $authReq->fetch();
    
        return $auth;
    }

}