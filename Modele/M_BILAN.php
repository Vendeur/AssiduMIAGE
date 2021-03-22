<?php 

require_once 'bd.php';

class modeleBilan extends bd {

    function getListFormation()
    {
        $bd = $this->dbConnexion();
        $req = $bd->query("SELECT * FROM formation order by libelleFormation");

        return $req;
    }

    function getListResultatRechercheBilan($recherche)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT idEtu, libelleCivil, nomEtu, prenomEtu, libelleFormation, libellePromo, libelleStatut
                            FROM etudiant e INNER JOIN civilite c on c.numCivil = e.numCivil
                            INNER JOIN promotion p on p.idPromo = e.idPromo
                            INNER JOIN formation f on f.idFormation = p.idFormation
                            INNER JOIN statut s on s.numStatut = e.numStatut
                            WHERE nomEtu LIKE ?
                            OR prenomEtu LIKE ?
                            ORDER BY nomEtu, prenomEtu
                            LIMIT 10");

        $valeur = $req->execute(array($recherche."%",$recherche."%"));
        return $req;
    }

    function getListBilanABI($idEtu,$dateDebut,$dateFin,$typeSem)
    {
        // $annee = date('Y');
        // $moisString = str_pad($mois, 2, 0, STR_PAD_LEFT);
        // if($mois == 12)
        // {
        //     $moisSuivant = "01";
        //     $anneSuivant = $annee+1;
        // }
        // else
        // {
        //     $moisSuivant = str_pad($mois+1, 2, 0, STR_PAD_LEFT);
        //     $anneSuivant = $annee;
        // }

        // AND dateSeance BETWEEN '".$annee."-".$moisString."-01' AND '".$anneSuivant."-".$moisSuivant."-01'

        $maRequete = "SELECT idSeance,dateSeance,libelleModule,libelleSem,libelleType, heureSeance, count(idSeance) as 'Nombre ABI', DATE_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(dureeSeance))),'%h h %i min') as 'Volume ABI'   
                            FROM ETUDIANT E INNER JOIN assidu a on A.idEtu = e.idEtu
                            INNER JOIN etat et on et.numEtat = a.numEtat
                            INNER JOIN SEANCE s on s.idSeance = a.numSeance
                            INNER JOIN MODULE M ON M.idModule = S.idModule
                            INNER JOIN SEMESTRE t on t.numSem = m.numSem
                            INNER JOIN type_semestre ts on ts.numType = t.numType
                            WHERE a.idEtu = ? AND et.libelleEtat = 'ABI' AND dateSeance BETWEEN ? AND ? ";
        
        if($typeSem == 1)
        {
            $maRequete .=" AND ts.numType = '1'";
        }
        elseif($typeSem == 2)
        {
            $maRequete .=" AND ts.numType = '2'";
        }

        $maRequete .= "GROUP BY dateSeance, idSeance, nomEtu, prenomEtu,libelleModule,libelleEtat, heureSeance
        ORDER BY dateSeance";

        $bd = $this->dbConnexion();
        $req = $bd->prepare($maRequete);

        $valeur = $req->execute(array($idEtu,$dateDebut,$dateFin));
        return $req;
    }



    function getTotalBilanABI($idEtu,$dateDebut,$dateFin, $typeSem)
    {
        $maRequete = "SELECT REPLACE(SUBSTR(SEC_TO_TIME( SUM( TIME_TO_SEC(dureeSeance) )),1,5),':',' h ') AS TotalABI
                            FROM ETUDIANT E INNER JOIN assidu a on A.idEtu = e.idEtu
                            INNER JOIN etat et on et.numEtat = a.numEtat
                            INNER JOIN SEANCE s on s.idSeance = a.numSeance
                            INNER JOIN MODULE M ON M.idModule = S.idModule
                            INNER JOIN semestre se on se.numSem = m.numSem
                            INNER JOIN type_semestre ts on ts.numType = se.numType
                            WHERE a.idEtu = ? AND et.libelleEtat = 'ABI' AND dateSeance BETWEEN ? AND ? ";

                            if($typeSem == 1)
                            {
                                $maRequete .=" AND ts.numType = '1'";
                            }
                            elseif($typeSem == 2)
                            {
                                $maRequete .=" AND ts.numType = '2'";
                            }

        $bd = $this->dbConnexion();
        $req = $bd->prepare($maRequete);
        $valeur = $req->execute(array($idEtu,$dateDebut,$dateFin));
        return $req;
    }





















    function getListBilanABJ($idEtu,$dateDebut,$dateFin,$typeSem)
    {
        $maRequete = "SELECT dateSeance,libelleModule,libelleSem,libelleType, idSeance,heureSeance, count(idSeance) as 'Nombre ABJ', DATE_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(dureeSeance))),'%h h %i min') as 'Volume ABJ'
                            FROM ETUDIANT E INNER JOIN assidu a on A.idEtu = e.idEtu
                            INNER JOIN etat et on et.numEtat = a.numEtat
                            INNER JOIN SEANCE s on s.idSeance = a.numSeance
                            INNER JOIN MODULE M ON M.idModule = S.idModule
                            INNER JOIN SEMESTRE t on t.numSem = m.numSem
                            INNER JOIN type_semestre ts on ts.numType = t.numType
                            WHERE a.idEtu = ? AND et.libelleEtat = 'ABJ' AND dateSeance BETWEEN ? AND ? ";
                            
                            if($typeSem == 1)
                            {
                                $maRequete .=" AND ts.numType = '1'";
                            }
                            elseif($typeSem == 2)
                            {
                                $maRequete .=" AND ts.numType = '2'";
                            }

        $maRequete .= "GROUP BY dateSeance, idSeance, nomEtu, prenomEtu,libelleModule,libelleEtat, heureSeance
        ORDER BY dateSeance";

        $bd = $this->dbConnexion();
        $req = $bd->prepare($maRequete);
        $valeur = $req->execute(array($idEtu,$dateDebut,$dateFin));
        return $req;
    }



    function getTotalBilanABJ($idEtu,$dateDebut,$dateFin,$typeSem)
    {
        $bd = $this->dbConnexion();
        $maRequete = "SELECT REPLACE(SUBSTR(SEC_TO_TIME( SUM( TIME_TO_SEC(dureeSeance) )),1,5),':',' h ') AS TotalABJ
                            FROM ETUDIANT E INNER JOIN assidu a on A.idEtu = e.idEtu
                            INNER JOIN etat et on et.numEtat = a.numEtat
                            INNER JOIN SEANCE s on s.idSeance = a.numSeance
                            INNER JOIN MODULE M ON M.idModule = S.idModule
                            INNER JOIN semestre se on se.numSem = m.numSem
                            INNER JOIN type_semestre ts on ts.numType = se.numType
                            WHERE a.idEtu = ? AND et.libelleEtat = 'ABJ' AND dateSeance BETWEEN ? AND ? ";

                        if($typeSem == 1)
                        {
                            $maRequete .=" AND ts.numType = '1'";
                        }
                        elseif($typeSem == 2)
                        {
                            $maRequete .=" AND ts.numType = '2'";
                        }

        $bd = $this->dbConnexion();
        $req = $bd->prepare($maRequete);
        $valeur = $req->execute(array($idEtu,$dateDebut,$dateFin));
        return $req;
    }



    function getListTypeSemestre()
    {
        $bd = $this->dbConnexion();
        $req = $bd->query("SELECT numType, libelleType 
                            FROM type_semestre
                            LIMIT 2");

        return $req;
    }








    function getInfoEtu($idEtu)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT idEtu, libelleCivil, nomEtu, prenomEtu, libellePromo, libelleFormation,  libelleStatut
                            FROM ETUDIANT E INNER JOIN civilite C ON E.numCivil = c.numCivil
                            INNER JOIN promotion p on e.idPromo = p.idPromo
                            INNER JOIN statut s on e.numStatut = s.numStatut
                            INNER JOIN formation f on p.idFormation = f.idFormation
                            WHERE idEtu = ?");

        $valeur = $req->execute(array($idEtu));
        return $req;
    }


    function getTypeSem($idSemestre)
    {
        $bd = $this->dbConnexion();
        $req = $bd->prepare("SELECT libelleType
                            FROM type_semestre
                            WHERE numType = ?");

        $valeur = $req->execute(array($idSemestre));
        return $req;
    }

    function getListModule()
    {
        $bd = $this->dbConnexion();
        $req = $bd->query("SELECT libelleModule FROM module order by idModule");

        return $req;
    } 
}