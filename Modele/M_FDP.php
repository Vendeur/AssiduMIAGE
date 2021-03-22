<?php 

require_once 'bd.php';

class modeleFdp extends bd 
{

    function getListFormation()
    {
        $bd = $this->dbConnexion();
        $req = $bd->query("SELECT * FROM formation order by libelleFormation");

        return $req;
    }

    function getListPromotion($idFormation)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT * FROM promotion WHERE idFormation = ?");
        $req->execute(array($idFormation));
        
        //var_dump($req);
        return $req;
    }

    function getEtudiant($idPromotion)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT * FROM etudiant WHERE idPromo = ?");
        $req->execute(array($idPromotion));
        //var_dump($req);
        return $req;
    } 


    function getListSeanceM($dateSeance)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT idSeance, concat(nomProf, ' ', prenomProf, ' | ', libelleModule, ' | ' ,heureSeance, ' | ', libellePromo) as NPAH
                            FROM SEANCE S INNER JOIN professeur p on s.numProf = p.numProf
                            INNER JOIN module m on s.idModule = m.idModule
                            INNER JOIN promotion promo on promo.idPromo = s.idPromo
                            WHERE dateSeance = ? AND idSeance NOT IN (select idSeance
                                                                      FROM SEANCE S INNER JOIN ASSIDU A ON S.idSeance = A.numSeance)
                            GROUP BY idSeance");
        $valeur = $req->execute(array($dateSeance));
        return $req;
    }

    function getListSeanceEtudiant($idSeance)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT idSeance, idEtu, nomEtu, prenomEtu
                            FROM SEANCE S INNER JOIN PROMOTION P ON S.idPromo = P.idPromo
                            INNER JOIN ETUDIANT E ON E.idPromo = P.idPromo
                            WHERE S.idSeance = ?");
        $valeur = $req->execute(array($idSeance));
        return $req;
    }

    function getListEtat()
    {
        $bd = $this->dbConnexion();
        $req = $bd->query("SELECT numEtat, libelleEtat
                           FROM etat");
        return $req;
    }

    function ajouterAssiduiter($seance,$numEtu,$etatEtu)
    {
        $bd = $this->dbConnexion();

        $req = $bd->prepare("INSERT INTO assidu (numSeance, idEtu, numEtat) VALUES (?,?,?)");
        $affectedLines = $req->execute(array($seance,$numEtu,$etatEtu));

        return $affectedLines;
    }


}