<?php

require_once'bd.php';

class modeleGestion extends bd 
{
    function getListSeanceG($dateSeance)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT s.idFormation, libelleFormation
                            FROM SEANCE S INNER JOIN professeur p on s.numProf = p.numProf
                            INNER JOIN prof_mod pm ON p.numProf = pm.numProf
                            INNER JOIN module m on pm.idMod = m.idModule
                            INNER JOIN promotion promo on promo.idPromo = s.idPromo
                            INNER JOIN formation f on f.idFormation = s.idFormation
                            WHERE dateSeance = ?
                            GROUP BY libelleFormation");
        $valeur = $req->execute(array($dateSeance));
        return $req;
    }

    function getListSeanceFormPromoGM($dateSeance, $libellePromo)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT s.idPromo, libellePromo
                            FROM SEANCE S INNER JOIN professeur p on s.numProf = p.numProf
                            INNER JOIN prof_mod pm ON p.numProf = pm.numProf
                            INNER JOIN module m on pm.idMod = m.idModule
                            INNER JOIN promotion promo on promo.idPromo = s.idPromo
                            INNER JOIN formation f on f.idFormation = s.idFormation
                            WHERE dateSeance = ? AND s.idFormation = ?
                            GROUP BY libellePromo");
        $valeur = $req->execute(array($dateSeance, $libellePromo));
        return $req;
    }














    function getListSeanceFormPromoGM3($dateSeance, $idFormation, $idPromo)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT s.idSeance, s.idPromo, concat(libellePromo,' | ',libelleModule,' | ', heureSeance,' | ', nomProf, ' ',prenomProf) as gestion
                            FROM SEANCE S INNER JOIN professeur p on s.numProf = p.numProf
                            INNER JOIN module m on s.idModule = m.idModule
                            INNER JOIN promotion promo on promo.idPromo = s.idPromo
                            INNER JOIN formation f on f.idFormation = s.idFormation
                            WHERE dateSeance = ? AND s.idFormation = ? AND s.idPromo = ? 
                            GROUP BY s.idSeance
                            ORDER BY heureSeance");
        $valeur = $req->execute(array($dateSeance, $idFormation, $idPromo));
        return $req;
    }


    function getListSeanceFormPromoFicheDePresenceG($idSeance)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT idSeance, A.idEtu, nomEtu, prenomEtu, eta.libelleEtat, eta.numEtat, concat(nomUser,' ',prenomUser) as User
                            FROM SEANCE S INNER JOIN assidu A on s.idSeance = A.numSeance
                            INNER JOIN ETAT Eta ON eta.numEtat = a.numEtat
                            INNER JOIN ETUDIANT e on e.idEtu = a.idEtu
                            INNER JOIN USER U ON S.idUser = U.idUser
                            WHERE idSeance = ?
                            ORDER BY nomEtu, prenomEtu");
        $valeur = $req->execute(array($idSeance));
        return $req;
    }
 
    function getListEtat($idSeance)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT a.numEtat, libelleEtat
                            FROM etat e 
                            INNER JOIN ASSIDU A ON e.numEtat = a.numEtat
                            INNER JOIN SEANCE S ON S.idSeance = a.numSeance
                            WHERE numSeance = ?");
        $valeur = $req->execute(array($idSeance));
        return $req;
    }

    function miseAJourAssiduiter($idEtat,$idEtu,$idSeance)
    {
        $bd = $this->dbConnexion();

        $req = $bd->prepare("UPDATE assidu SET numEtat = ?
                                           WHERE  idEtu = ? AND numSeance = ?");

        $affectedLines = $req->execute(array($idEtat,$idEtu,$idSeance));

        return $affectedLines;
    }

    function getUserFicheDePresence($numSeance)
    {
        $bd = $this->dbConnexion();

        $req = $bd->prepare("SELECT concat(nomUser,' ', prenomUser) as User
                            FROM USER U INNER JOIN SEANCE S ON S.idUser = U.idUser
                            WHERE idSeance = ?");

        $affectedLines = $req->execute(array($numSeance));

        return $req;
    }

    function getEtatFicheDePresence($numSeance)
    {
        $bd = $this->dbConnexion();

        $req = $bd->prepare("SELECT libelleFA
                            FROM fiche_appel FA INNER JOIN SEANCE S ON S.numFA = FA.numFA
                            WHERE idSeance = ?");

        $affectedLines = $req->execute(array($numSeance));

        return $req;
    }

    


}

?>