<?php

if (isset($_POST['Fonction']) && $_POST['Fonction'] != '')
{
    $_POST['Fonction']($_POST);
	//getPromotion($data);
}

//Recupere la formatiion
function getPromotion($data)
{
	//declare le model qui fait les requete SQL
	require_once "../Modele/M_FDP.php";

	//recupere et declare variable
	$idFormation = htmlspecialchars($data['idFormation']);

	//Fait appel au model
	$modeleFdp = new modeleFdp();

	//verifie que la valeur du select n'est pas 0
	if($idFormation != 0)
	{
		//Appel la fonction concerne pour recupere les donne de la BDD
		$listPromotion = $modeleFdp->getListPromotion($idFormation);

		//listPromotion sera utilser dans la boucle php dans le fichier affichePromotion

		//Appel de la vue pour afficher le prochain select (il sera affiche dans une DIV grace au JS)
		include '../view/affichePromotion.php';
	}
}

function getEleve($data)
{
	require_once "../Modele/M_FDP.php";
	$idPromo = htmlspecialchars($data['idPromotion']);
	$modeleFdp = new modeleFdp();

	if($idPromo != 0)
	{
		//Appel la fonction concerne pour recupere les donne de la BDD
		$listEleve = $modeleFdp->getEtudiant($idPromo);

		//listPromotion sera utilser dans la boucle php dans le fichier affichePromotion

		//Appel de la vue pour afficher le prochain select (il sera affiche dans une DIV grace au JS)
		include '../view/afficheEleve.php';
	}

}

function getModule($data)
{
	require_once "../Modele/M_CREESEANCE.php";
	require_once "../Modele/M_FDP.php";

	$idModule = htmlspecialchars($data['idModule']);
	$modeleCS = new modeleCreeSeance();

	// var_dump($idModule);
	if($idModule != 0)
	{
		//Appel la fonction concerne pour recupere les donne de la BDD
		$listProf = $modeleCS->getListModuleProf($idModule);
		$typeModuleSem = $modeleCS->getTypeModule($idModule);

		//var_dump($listProf);
		//listPromotion sera utilser dans la boucle php dans le fichier affichePromotion

		//Appel de la vue pour afficher le prochain select (il sera affiche dans une DIV grace au JS)
		include '../view/afficheProf.php';
	}
}

function getModulePromo($data)
{
	require_once "../Modele/M_CREESEANCE.php";
	require_once "../Modele/M_FDP.php";

	$idPromo = htmlspecialchars($data['idPromo']);
	// $idModule = htmlspecialchars($data['idModule']);
	$modeleCS = new modeleCreeSeance();

	// var_dump($idModule);
	if($idPromo != 0)
	{
		//Appel la fonction concerne pour recupere les donne de la BDD
		$listPromoModule = $modeleCS->getPromoModule($idPromo);
		// $typeModuleSem = $modeleCS->getTypeModule($idModule);

		//var_dump($listProf);
		//listPromotion sera utilser dans la boucle php dans le fichier affichePromotion

		//Appel de la vue pour afficher le prochain select (il sera affiche dans une DIV grace au JS)
		include '../view/afficheModule.php';
	}
}



function getListSeance($data)
{
	require_once "../Modele/M_FDP.php";
	$dateFDP = htmlspecialchars($data['dateFDP']);
	$modeleFdp = new modeleFdp();

	if($dateFDP != 0)
	{
		//Appel la fonction concerne pour recupere les donne de la BDD
		$listSeance = $modeleFdp->getListSeanceM($dateFDP);
		$count = $listSeance->rowCount();

		//listPromotion sera utilser dans la boucle php dans le fichier affichePromotion

		//Appel de la vue pour afficher le prochain select (il sera affiche dans une DIV grace au JS)
		include '../view/affichelistSeance.php';
	}

}

function getListSeanceEtudiant($data)
{
	require_once "../Modele/M_FDP.php";
	$idSeance = htmlspecialchars($data['idSeance']);
	$modeleFdp = new modeleFdp();

	if($idSeance != 0)
	{
		//Appel la fonction concerne pour recupere les donne de la BDD
		$listSeanceEtudiant = $modeleFdp->getListSeanceEtudiant($idSeance);

		$listEtat = $modeleFdp->getListEtat();
		$tableEtat = $listEtat->fetchAll();

		//listPromotion sera utilser dans la boucle php dans le fichier affichePromotion

		//Appel de la vue pour afficher le prochain select (il sera affiche dans une DIV grace au JS)
		include '../view/affichelistSeanceEtudiant.php';
	}

}




function getListPromoG($data)
{
	require_once "../Modele/M_GESTION.php";
	$dateG = htmlspecialchars($data['dateG']);
	$modeleGestion = new modeleGestion();

	if($dateG != 0)
	{
		//Appel la fonction concerne pour recupere les donne de la BDD
		$listSeanceG = $modeleGestion->getListSeanceG($dateG);
		$count = $listSeanceG->rowCount();

		//listPromotion sera utilser dans la boucle php dans le fichier affichePromotion

		//Appel de la vue pour afficher le prochain select (il sera affiche dans une DIV grace au JS)
		include '../view/affichelistFormG.php';
	}

}



function getListSeanceFormPromoG($data)
{
	require_once "../Modele/M_GESTION.php";
	
	$dateG = htmlspecialchars($data['date']);
	$formG = htmlspecialchars($data['form']);

	$modeleGestion = new modeleGestion();

	// var_dump($dateG);
	// var_dump($formG);

	if($dateG != 0 && $formG != 0)
	{
		//Appel la fonction concerne pour recupere les donne de la BDD
		$listSeanceFormPromoG = $modeleGestion->getListSeanceFormPromoGM($dateG,$formG);
		// $count = $listSeance->rowCount();

		//listPromotion sera utilser dans la boucle php dans le fichier affichePromotion

		//Appel de la vue pour afficher le prochain select (il sera affiche dans une DIV grace au JS)
		include '../view/affichelistFormPromo.php';
	}

}





function getListSeanceFormPromoG3($data)
{
	require_once "../Modele/M_GESTION.php";

	$dateG = htmlspecialchars($data['date']);
	$formG = htmlspecialchars($data['form']);
	$promoG = htmlspecialchars($data['promo']);

	$modeleGestion = new modeleGestion();

	// var_dump($dateG);
	// var_dump($formG);
	// var_dump($promoG);

	if($dateG != 0 && $formG != 0 && $promoG != 0)
	{
		//Appel la fonction concerne pour recupere les donne de la BDD
		$listSeanceFormPromoGM3 = $modeleGestion->getListSeanceFormPromoGM3($dateG,$formG, $promoG);
		$count = $listSeanceFormPromoGM3 ->rowCount();

		//listPromotion sera utilser dans la boucle php dans le fichier affichePromotion

		//Appel de la vue pour afficher le prochain select (il sera affiche dans une DIV grace au JS)
		include '../view/affichelistFormPromoGM3.php';
	}

}






function getListSeanceFormPromoFicheDePresence($data)
{

	$numSeanceG = htmlspecialchars($data['numSeance']);

	if($numSeanceG != 0)
	{
		require_once "../Modele/M_GESTION.php";
		$modeleGestion = new modeleGestion();

		//Appel la fonction concerne pour recupere les donne de la BDD
		$listSeanceFormPromoFicheDePresence = $modeleGestion->getListSeanceFormPromoFicheDePresenceG($numSeanceG);
		$userSeance = $modeleGestion->getUserFicheDePresence($numSeanceG);
		$etatFA = $modeleGestion->getEtatFicheDePresence($numSeanceG);

		require_once "../Modele/M_FDP.php";
		$modeleFdp = new modeleFdp();
		
		$listEtat = $modeleFdp->getListEtat();
		$tableEtat = $listEtat->fetchAll();

		//listPromotion sera utilser dans la boucle php dans le fichier affichePromotion

		//Appel de la vue pour afficher le prochain select (il sera affiche dans une DIV grace au JS)
		require '../view/affichelistFormPromoFicheDePresence.php';
	}

}

function getPromotionBilan($data)
{
	require_once "../Modele/M_BILAN.php";

	$idFormationBilan = htmlspecialchars($data['idFormation']);
	// var_dump($numSeanceG);

	$modeleBilan = new modeleBilan();

	// var_dump($dateG);
	// var_dump($formG);
	// var_dump($promoG);

	if($numSeanceG != 0)
	{
		//Appel la fonction concerne pour recupere les donne de la BDD
		$listSeanceFormPromoFicheDePresence = $modeleGestion->getListSeanceFormPromoFicheDePresenceG($numSeanceG);
		// $count = $listSeanceFormPromoFicheDePresence ->rowCount();

		$listEtat = $modeleGestion->getListEtat($numSeanceG);
		$tableEtat = $listEtat->fetchAll();

		// var_dump($tableEtat);

		//listPromotion sera utilser dans la boucle php dans le fichier affichePromotion

		//Appel de la vue pour afficher le prochain select (il sera affiche dans une DIV grace au JS)
		include '../view/affichelistFormPromoFicheDePresence.php';
	}

}




function getResultatRecherche($data)
{
	require_once "../Modele/M_BILAN.php";

	$resultatRecherche = htmlspecialchars($data['rt']);
	// var_dump($resultatRecherche);

	$modeleBilan = new modeleBilan();

	if($resultatRecherche != "")
	{
		//Appel la fonction concerne pour recupere les donne de la BDD
		$listResultatRecherche = $modeleBilan->getListResultatRechercheBilan($resultatRecherche);
		// $count = $listSeanceFormPromoFicheDePresence ->rowCount();

		//$listEtat = $modeleGestion->getListEtat($numSeanceG);
		//$tableEtat = $listEtat->fetchAll();

		// var_dump($listResultatRecherche);

		//listPromotion sera utilser dans la boucle php dans le fichier affichePromotion

		//Appel de la vue pour afficher le prochain select (il sera affiche dans une DIV grace au JS)
		include '../view/afficheRechercheEtudiant.php';
	}

}