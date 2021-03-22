<?php

if (isset($_POST['Fonction']) && $_POST['Fonction'] != '')
{
    $_POST['Fonction']($_POST);
}

function afficheInfoEtu($data)
{
    require_once "../Modele/M_BILAN.php";

    $idEtudiant = htmlspecialchars($data['idEtu']);
    $dateD = htmlspecialchars($data['dateD']);
	$dateF = htmlspecialchars($data['dateF']);
	$typeSemestre = htmlspecialchars($data['ts']);

    $modeleBilan = new modeleBilan();

    if($idEtudiant != 0)
	{
		//Appel la fonction concerne pour recupere les donne de la BDD
		$listBilanABI = $modeleBilan->getListBilanABI($idEtudiant, $dateD, $dateF,$typeSemestre);
		$listTotalABI = $modeleBilan->getTotalBilanABI($idEtudiant, $dateD, $dateF,$typeSemestre);

		$listBilanABJ = $modeleBilan->getListBilanABJ($idEtudiant, $dateD, $dateF,$typeSemestre);
		$listTotalABJ = $modeleBilan->getTotalBilanABJ($idEtudiant, $dateD, $dateF,$typeSemestre);

		$infoSemestre = $modeleBilan->getTypeSem($typeSemestre);
		$infoEtu = $modeleBilan-> getInfoEtu($idEtudiant);

		$countABI = $listBilanABI->rowCount();
		$countABJ = $listBilanABJ->rowCount();

		$countTT = $countABJ + $countABI;

		//listPromotion sera utilser dans la boucle php dans le fichier affichePromotion

		//Appel de la vue pour afficher le prochain select (il sera affiche dans une DIV grace au JS)
		include '../view/afficheInformationEtu.php';
	}
}
