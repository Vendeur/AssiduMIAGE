<?php 

require_once 'bd.php';

class modeleConnexion extends bd {

    function verifUser($id, $pw)
    {
        $bd = $this->dbConnexion();

        $req = $bd->prepare("SELECT * FROM user WHERE nomUser = ? AND mdpUser = ?");
        $req->execute(array($id, $pw));

        return $req;
    }
}