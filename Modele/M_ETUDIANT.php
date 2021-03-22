<?php 

require_once 'bd.php';

class modeleEtudiant extends bd {

    function saveStatutEtu($idEtu, $statutEtu, $idSeance)
    {
        $bd = $this->dbConnexion();

        $req = $bd->prepare("INSERT INTO ASSIDU(idEtu, statutEtu, idSeance) VALUES (?,?,?) ");
        $req->execute(array($idEtu, $statutEtu, $idSeance));

        return $req;
    }
}