<?php


function affichageFdp() // Affichage de la vue
{
    $modeleFdp = new modeleFdp();
    // $listFormation = $modeleFdp->getListFormation();

    require 'view/V_FDP.php';
}

function creerFdp()
{
    $modeleFdp = new modeleFdp();

        if($_POST['selectSeance'] != 0 AND $_POST['numeroEtudiant'] != 0)
        {
            $seance = htmlspecialchars($_POST['selectSeance']);

            $erreur = 0;
            $nbLigne = 0;

           foreach ($_POST['numeroEtudiant'] as $keyEtu => $valueEtu)
           {
               foreach ($_POST['selectEtat'] as $keyEtat => $valueEtat)
               {
                   if($keyEtu == $keyEtat)
                   {
                       $nbLigne++;
                        $affectedLines = $modeleFdp->ajouterAssiduiter($seance,$valueEtu,$valueEtat);

                        if($affectedLines == false)
                        {
                            $erreur++;
                        }
                   }
               }
           }
           if($erreur == 0)
           {
                $_POST['msg'] = $nbLigne." assiduités ont été ajouté sur ".$nbLigne;
           }
           else
           {
                $totalAjout = $nbLigne - $erreur;
                $_POST['erreur'] = "Erreur : ".$totalAjout." assiduités ont été ajouté sur ".$nbLigne;
           }
        }
        else{
            $_POST['erreur'] = "Veuillez sélectionner une valeur dans les listes déroulantes";
        }
        
}




?>
