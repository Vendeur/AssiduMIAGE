<?php

function affichageGestion() // Affichage de la vue
{
    $modeleGestion = new modeleGestion();

    require 'view/V_GESTION.php';
}

function miseAJourAssiduiter()
{
    $modeleGestion = new modeleGestion();

        if($_POST['selectFicheDePresence'] != 0 AND $_POST['numeroEtudiant'] != 0)
        {
            $seance = htmlspecialchars($_POST['selectFicheDePresence']);

            $erreur = 0;
            $nbLigne = 0;

           foreach ($_POST['numeroEtudiant'] as $keyEtu => $valueEtu)
           {
               foreach ($_POST['selectEtat'] as $keyEtat => $valueEtat)
               {
                   if($keyEtu == $keyEtat)
                   {

                        $nbLigne++;
                        $affectedLines = $modeleGestion->miseAJourAssiduiter($valueEtat,$valueEtu,$seance);

                        if($affectedLines == false)
                        {
                            $erreur++;
                        }
                   }
               }
           }
           if($erreur == 0)
           {
                $_POST['msg'] = $nbLigne." assiduités ont été mises à jour sur ".$nbLigne;
           }
           else
           {
                $totalAjout = $nbLigne - $erreur;
                $_POST['erreur'] = "Erreur : ".$totalAjout." assiduités ont été mise à jour sur ".$nbLigne;
           }
        }
        else{
            $_POST['erreur'] = "Veuillez sélectionner une valeur dans les listes déroulantes";
        }
        
}




?>