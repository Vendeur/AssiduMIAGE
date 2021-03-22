<?php

function affichageBilan() // Affichage de la vue
{
    $modeleBilan = new modeleBilan();
    $listFormation = $modeleBilan->getListFormation();
    $listTypeSemestre = $modeleBilan->getListTypeSemestre();

    require 'view/V_BILAN.php';
}

?>