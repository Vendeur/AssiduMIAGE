<?php 

require_once 'bd.php';

class modeleCreeSeance extends bd 
{
    function getListFormation()
    {
        $bd = $this->dbConnexion();
        $req = $bd->query("SELECT * FROM formation order by libelleFormation");

        return $req;
    }
    
    function getListModule()
    {
        $bd = $this->dbConnexion();
        $req = $bd->query("SELECT * FROM module order by libelleModule");

        return $req;
    }

    function getListModuleProf($idModule)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT f.numProf, concat(nomProf,' ' ,prenomProf) as prof
                            FROM prof_mod pm INNER join professeur f on pm.numProf = f.numProf
                            INNER JOIN Module m on pm.idMod = m.idModule
                            INNER JOIN TC_OPT t on t.numTCO = m.numTCO
                            INNER JOIN SEMESTRE s on s.numSem = m.numSem
                            WHERE m.idModule = ?");
        $req->execute(array($idModule));

        //var_dump($req);
        return $req;
    }

    function getTypeModule($idModule)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT libelleTCO, libelleSem, abvModule
                            FROM semestre s INNER JOIN module m on m.numSem = s.numSem
                            INNER JOIN tc_opt t ON t.numTCO = m.numTCO
                            where m.idModule = ?");
        $req->execute(array($idModule));

        return $req;
    }


    
    /* function getListCreneau()
    {
        $bd = $this->dbConnexion();
        $req = $bd->query("SELECT numCre, libelleCre FROM creneau");

        return $req;
    } */


    function getListFA()
    {
        $bd = $this->dbConnexion();
        $req = $bd->query("SELECT numFA, libelleFA 
                        FROM fiche_appel ");

        return $req;
    }


    function getPromoModule($idPromo)
    {
        $bd = $this->dbConnexion();

        $req = $bd->prepare("SELECT pm.idModule, libelleModule 
        FROM MODULE m inner join promo_mod pm on m.idModule = pm.idModule 
        inner join promotion p on p.idPromo = pm.idPromo 
        WHERE pm.idPromo = ?");
        $req->execute(array($idPromo));

        return $req;
    }

    function ajouterSeance($date,$heure,$duree,$FA,$module,$prof,$idUser,$idPromotion, $idFormation)
    {
        $bd = $this->dbConnexion();

        $req = $bd->prepare("INSERT INTO seance (dateSeance, heureSeance, dureeSeance, numFA, idModule, numProf, idUser, idPromo, idFormation)
                                VALUES (?,?,?,?,?,?,?,?,?)");
        $affectedLines = $req->execute(array($date,$heure,$duree,$FA,$module,$prof,$idUser,$idPromotion,$idFormation));

        return $affectedLines;
    }
}