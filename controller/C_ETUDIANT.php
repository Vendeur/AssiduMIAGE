<?php

function affichageEtudiant()
{
    $idPromo = htmlspecialchars($_GET['idPromo']);// transfert via le lien

    $modeleFdp = new modeleFdp();

    $lstEtudiant = $modeleFdp->getEtudiant($idPromo);

    require 'view/V_ETUDIANT.php';
}

function saveStatutEtu()
{
    foreach($_POST['statutEtu'] as $value)
    {
        echo "<script>alert('".$value."')</script>";
    }
}