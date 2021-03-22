<?php

session_start();

require_once('Modele/M_CONNEXION.php');
require_once('Modele/M_FDP.php');
require_once('Modele/M_CREESEANCE.php');
require_once('Modele/M_GESTION.php');
require_once('Modele/M_BILAN.php');

if(isset($_SESSION['idUser']))
{
    if(isset($_GET['deconnexion']))
    {
        require './controller/C_CONNEXION.php';
        deconnexion();
    }

    if(isset($_GET['page']))
    {
        $page = htmlspecialchars($_GET['page']);
    }

    else {

        $page = 'default';
    }

    switch($page)
    {
        case 'CreerSeance':
            require 'controller/C_CREESEANCE.php';
            if(isset($_POST['btnCreerSeance']))
            {
                creerSeance();
            }
            afficheSeance();
            break;
        case 'etudiant':
            require 'controller/C_ETUDIANT.php';
            if(isset($_POST['validerStatutEtu']))
            {
                saveStatutEtu();
            }
            affichageEtudiant();
            break;
        case 'fdp':
            require 'controller/C_FDP.php';
            if(isset($_POST['btnCreerAssiduiter']))
            {
                creerFdp();
            }
            affichageFdp(); //Affichage de la page
            break;
        case 'gestion':
            require 'controller/C_GESTION.php';
            if(isset($_POST['btnMiseAJourAssduiter']))
            {
                miseAJourAssiduiter();
            }
            affichageGestion(); //Affichage de la page
            break;
        case 'bilan':
            require 'controller/C_BILAN.php';
            affichageBilan(); //Affichage de la page
            break;
        case 'pdf':
            require 'view/test.php';
            require 'fpdf/fpdf.php';
            break;
        default :
            require 'controller/C_ACCEUIL.php'; // Appel au controleur
            affichageAcceuil();
            break;
    }

}

else 
{
    require './controller/C_CONNEXION.php';
    if(isset($_GET['connexion']))
    {
        connexion();
    }
    affichageConnexion();
}