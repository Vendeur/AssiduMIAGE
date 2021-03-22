<?php 

function afficheSeance()
{
    $modeleCS = new modeleCreeSeance();

    $listModule = $modeleCS->getListModule();
    // $listCreneau = $modeleCS->getListCreneau();
    $listFA = $modeleCS->getListFA();
    $listFormation = $modeleCS->getListFormation();

    require 'view/V_CREESEANCE.php';
}

function creerSeance()
{
    $modeleCS = new modeleCreeSeance();

    if(!empty($_POST['dateCreneau']) AND !empty($_POST['heureCreneau']) AND 
            !empty($_POST['dureeCreneau']) AND !empty($_POST['FA']) AND 
            !empty($_POST['selectModule']) AND !empty($_POST['selectProf']))
    {
        if($_POST['FA'] != 0 AND $_POST['selectProf'] != 0 AND $_POST['selectModule'] != 0)
        {
            $date = htmlspecialchars($_POST['dateCreneau']);
            $heure = htmlspecialchars($_POST['heureCreneau']);
            $duree = htmlspecialchars($_POST['dureeCreneau']);
            $FA = htmlspecialchars($_POST['FA']);
            $module = htmlspecialchars($_POST['selectModule']);
            $prof = htmlspecialchars($_POST['selectProf']);
            $idPromotion = htmlspecialchars($_POST['selectProm']);
            $idFormation = htmlspecialchars($_POST['selectFormation']);


            $affectedLines = $modeleCS->ajouterSeance($date,$heure,$duree,$FA,$module,$prof,$_SESSION['idUser'],$idPromotion, $idFormation);

            if($affectedLines)
            {
                $_POST['msg'] = "Succès de la création de la séance, vous pouvez ajouter les présences <strong><a href='?page=fdp'>ICI</a></strong>";
            }
            else
            {
                $_POST['erreur'] = "Une erreur est survenue lors de l'ajout";
            }
        }
        else{
            $_POST['erreur'] = "Veuillez sélectionner une valeur dans les listes déroulantes";
        }
        
    }
    else{
        $_POST['erreur'] = "Veuillez renseigner toutes les informations obligatoire";
    }
}



?>