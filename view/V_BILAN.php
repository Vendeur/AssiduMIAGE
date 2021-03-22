<?php
require './Include/Bibliotheque.php';

ob_start(); //début de l'enregistrement dans variable

$title = 'Bilan';

?>

<center>
    <h1>
        Bilan ABI et ABJ
    </h1>
</center>

<?php
if(isset($_POST['erreur']))
{
    echo '<div class = "erreur">'. $_POST['erreur']. '</div>';
}
if(isset($_POST['msg']))
{
    echo '<div class = "msg">'. $_POST['msg']. '</div>';
}
?>

<div id="erreurJs" class="erreur" style="display:none;">
</div>

<!-- <div class="form-group row">
  <label for="dateDebut" class="col-2 col-form-label">Date début</label>
    <div class="col-3">
        <input class="form-control" type="date" id="dateDebut" name="dateDebut"  value="<?= date('Y-m-d');?>" required onchange = "entrerDate()">
    </div>
</div>

<div class="form-group row">
  <label for="dateFin" class="col-2 col-form-label">Date fin</label>
    <div class="col-3">
        <input class="form-control" type="date" id="dateFin" name="dateFin"  value="" required onchange = "entrerDate()">
    </div>
</div>

<div class="form-group row">
  <label for="searchBar" class="col-2 col-form-label">Rechercher un étudiant</label>
    <div class="col-3">
        <input class="form-control" type="search" id="searchBar"  name="searchBar" placeholder = "Entrez un nom ou prénom..." autofocus>
    </div>
</div> -->

    <form action = "?page=pdf" method ="post">

        <div class="form-group row">
            <label for="dateDebut" class="col-sm-2 col-form-label">Date début</label>
                <div class="col-sm-3">
                    <input class="form-control" type="date" id="dateDebut" name="dateDebut"  value="<?= date('Y-m-d');?>" required onchange = "entrerDate()">
                </div>
        </div>

        <div class="form-group row">
            <label for="dateFin" class="col-sm-2 col-form-label">Date fin</label>
                <div class="col-sm-3">
                    <input class="form-control" type="date" id="dateFin" name="dateFin"  value="<?= date('Y-m-d');?>" required onchange = "entrerDate()">
                </div>
        </div>

        <div class="form-group row">
            <label for="dateFin" class="col-sm-2 col-form-label">Type semestre</label>
                <div class="col-sm-3">
                <select class="form-control" id = "typeSem" name = "typeSem" required>
                    <option value="0">Pair et Impair</option><?php
                    
                    while($data = $listTypeSemestre->fetch())
                    {
                        ?>
                            <option value="<?= $data['numType']; ?>"><?= $data['libelleType']; ?></option>
                        <?php
                    }
                        ?>
                </select>
                </div>
        </div>


        <div class="form-group row">
            <label for="searchBar" class="col-sm-2 col-form-label">Rechercher un étudiant</label>
                <div class="col-sm-3">
                    <input class="form-control" type="search" id="searchBar" name="searchBar" placeholder = "Entrez un nom ou prénom..." autofocus>
                </div>
        </div>
    

    <!-- Affichage du select Promotion grace au JS -->

  <div id = "afficheRechercheEtudiant">
    </div>

    <div id = "afficheInformationEtu">

    </div>

    </form>

<?php 

$content = ob_get_clean();
// fin enregistrement est stockee dans $content

require('template.php');

?>