<?php 

require './fpdf/fpdf.php';

// require './fpdf/makefont/makefont.php';

class PDF extends FPDF
{
    
// En-tête
function Header()
{
    // Logo $this->Image('../fpdf/AMU.png',10,6,30);
    // $this->Image('./fpdf/AMU_L.png',140,10,70);
    $this->Image('./fpdf/MIAGE.png',130,10,70);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(80);
    // Titre
    $this->Cell(0,100,'BILAN D\'ABSENCE');
    // Saut de ligne
    $this->Ln(60);

}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}


// Instanciation de la classe dérivée

$h = 8;

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Ln(15);

$dateDebut = $_POST['dateDebut'];
$dateFin = $_POST['dateFin'];
$typeSemestre = $_POST['typeSem'];
$numEtu = $_POST['numeroEtu'];

$modeleBilan = new modeleBilan(); // Declaration du modèle BILAN puisqu'il contient toutes les requêtes pour récupérer les infos

$infoEtu = $modeleBilan->getInfoEtu($numEtu);
$EtudiantInfo = $infoEtu->fetch();




$pdf->Cell(20, 7, "Civilité : ", 0, 0, "L", false);
$pdf->Cell(80, 7, $EtudiantInfo['libelleCivil'], 0, 0, "L", false);

$pdf->Cell(25, 7, "Formation : ", 0, 0, "L", false);
$pdf->Cell(65, 7, $EtudiantInfo['libelleFormation']. " MIAGE", 0, 0, "L", false);
$pdf->Ln();







$pdf->Cell(20, 7, "Nom : ", 0, 0, "L", false);
$pdf->Cell(80, 7, $EtudiantInfo['nomEtu'], 0, 0, "L", false);


$pdf->Cell(25, 7, "Promotion : ", 0, 0, "L", false);
$pdf->Cell(65, 7, $EtudiantInfo['libellePromo'], 0, 0, "L", false);
$pdf->Ln();



$pdf->Cell(20, 7, "Prénom : ", 0, 0, "L", false);
$pdf->Cell(80, 7, $EtudiantInfo['prenomEtu'], 0, 0, "L", false);

$pdf->Cell(25, 7, "Statut : ", 0, 0, "L", false);
$pdf->Cell(65, 7, $EtudiantInfo['libelleStatut'], 0, 0, "L", false);
$pdf->Ln();


// $pdf->Cell(20, 7, "Formation : ", 1, 0, "L", false);  "           Promotion :   " . $EtudiantInfo['libellePromo'] . "     Statut :   ".  $EtudiantInfo['libelleStatut']. "\n", 0, 0, "L", false);
// $pdf->Cell(20, 7, $EtudiantInfo['libelleFormation']. " MIAGE", 1, 0, "L", false);
$pdf->Ln();
$pdf->Ln(5);
$pdf->Write($h, "                                                      Pour la période du " . strftime('%d/%m/%Y', strtotime($dateDebut)) ." au " . strftime('%d/%m/%Y', strtotime($dateFin)). "\n");


// Sets the background color to light gray
$pdf->SetFillColor(209, 207, 207);
 
// Cell
$pdf->Cell(20, 5, "Date", 1, 0, "C", true);
$pdf->Cell(15, 5, "Heure", 1, 0, "C", true);
$pdf->Cell(70, 5, "Module", 1, 0, "C", true);
$pdf->Cell(17, 5, "Semestre", 1, 0, "C", true);
$pdf->Cell(15, 5, "Type", 1, 0, "C", true);
$pdf->Cell(27, 5, "ABI (nombre)", 1, 0, "C", true);
$pdf->Cell(27, 5, "ABI (Volume)", 1, 0, "C", true);
$pdf->Ln();


$listBilanABI = $modeleBilan->getListBilanABI($numEtu, $dateDebut, $dateFin,$typeSemestre);
$TotalABIVolume = $modeleBilan->getTotalBilanABI($numEtu, $dateDebut, $dateFin,$typeSemestre);
$TotalABIVol = $TotalABIVolume->fetch();

$countABI = $listBilanABI->rowCount(); // Compteur de ligne ABI

$TotalABInombre = 0;

    while ($data = $listBilanABI->fetch())
    {
        $pdf->SetFont('Times','',7);
        
        $xDepart = $pdf->GetX();
        $yDepart = $pdf->GetY();

        $pdf->Cell(20, 5, $data['dateSeance'], 1);
        $pdf->Cell(15, 5, $data['heureSeance'], 1);
        $pdf->Cell(70, 5, $data['libelleModule'], 1);
        $pdf->Cell(17, 5, $data['libelleSem'], 1);
        $pdf->Cell(15, 5, $data['libelleType'], 1);
        $pdf->Cell(27, 5, $data['Nombre ABI'], 1);
        $pdf->Cell(27, 5, $data['Volume ABI'], 1);

        $TotalABInombre += $data['Nombre ABI'];
        
        $pdf->Ln();

        $xFin = $pdf->GetX();
        $yFin = $pdf->GetY();   
        $offset = 5;   

        //$pdf->Cell($xDepart - $offset, $yDepart - $offset, '', $yFin + $offset, 0);

    }

    if($countABI == 0)
    {
        $pdf->SetFont('Times','',7);
        
        $xDepart = $pdf->GetX();
        $yDepart = $pdf->GetY();

        $xFin = $pdf->GetX();
        $yFin = $pdf->GetY();   
        $offset = 5;  

        $pdf->Cell(191, 5, 'Aucune ABI', 1);
    }
    else {

        $pdf->Cell(137, 5, "Total", 1);
        $pdf->Cell(27, 5, $TotalABInombre, 1);
        $pdf->Cell(27, 5, $TotalABIVol['TotalABI'] . " min", 1);
    }
    

    $pdf->Ln();
    $pdf->Ln();




    $pdf->SetFillColor(209, 207, 207);
 
    $pdf->Cell(20, 5, "Date", 1, 0, "C", true);
    $pdf->Cell(15, 5, "Heure", 1, 0, "C", true);
    $pdf->Cell(70, 5, "Module", 1, 0, "C", true);
    $pdf->Cell(17, 5, "Semestre", 1, 0, "C", true);
    $pdf->Cell(15, 5, "Type", 1, 0, "C", true);
    $pdf->Cell(27, 5, "ABJ (nombre)", 1, 0, "C", true);
    $pdf->Cell(27, 5, "ABJ (Volume)", 1, 0, "C", true);
    $pdf->Ln();

    $listBilanABJ = $modeleBilan->getListBilanABJ($numEtu, $dateDebut, $dateFin,$typeSemestre);
    $listTotalABJ = $modeleBilan->getTotalBilanABJ($numEtu, $dateDebut, $dateFin,$typeSemestre);
    $TotalABJVol = $listTotalABJ->fetch();

    $countABJ = $listBilanABJ->rowCount(); // Compteur de ligne ABJ
    $countTT = $countABI + $countABJ;

    $TotalABJnombre = 0;

    if($countTT == 0)
    {
        echo 'Aucune ABI et ABJ cette élève.';
    }

    while ($data = $listBilanABJ->fetch())
    {
        $pdf->SetFont('Times','',7);
        
        $xDepart = $pdf->GetX();
        $yDepart = $pdf->GetY();

        
        $pdf->Cell(20, 5, $data['dateSeance'], 1);
        $pdf->Cell(15, 5, $data['heureSeance'], 1);
        $pdf->Cell(70, 5, $data['libelleModule'], 1);
        $pdf->Cell(17, 5, $data['libelleSem'], 1);
        $pdf->Cell(15, 5, $data['libelleType'], 1);
        $pdf->Cell(27, 5, $data['Nombre ABJ'], 1);
        $pdf->Cell(27, 5, $data['Volume ABJ'], 1); 

        $TotalABJnombre += $data['Nombre ABJ'];
        
        $pdf->Ln();

        $xFin = $pdf->GetX();
        $yFin = $pdf->GetY();   
        $offset = 5;   
    }

    if($countABJ == 0)
    {
        $pdf->Cell(191, 5, 'Aucune ABJ', 1);
    }

    else {

        $pdf->Cell(137, 5, "Total", 1);
        $pdf->Cell(27, 5, $TotalABJnombre, 1);
        $pdf->Cell(27, 5, $TotalABJVol['TotalABJ'] . " min", 1);
        $pdf->Ln();
    }

    /* $listeModule = $modeleBilan->getListModule();

    while ($data = $listeModule->fetch())
    {
        $pdf->Cell(20, 5, 'Date', 1);
        $pdf->Cell(15, 5, 'Heure', 1);
        $pdf->Cell(70, 5, $data['libelleModule'], 1);
        $pdf->Ln();
    }  */  

        $pdf->SetY(220);
        $pdf->SetX(150);
        $pdf->Cell(10, 20, "Fait à Aix-Marseille, le ". strftime('%d/%m/%Y', strtotime(date("m.d.y"))));
     
 

$pdf->Output('BILAN D\'ABSENCE '.$EtudiantInfo['nomEtu'].' '.$EtudiantInfo['prenomEtu'].' '.$EtudiantInfo['libellePromo'].'.pdf', 'I');
?>