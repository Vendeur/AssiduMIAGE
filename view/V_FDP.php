<?php
require './Include/Bibliotheque.php';

ob_start(); //début de l'enregistrement dans variable

$title = 'Fiche de présence';

?>

<center>
    <h1>
        Fiche de présence
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

<br>
<div class="container">

<form action="" method="post">
<!-- <label for="dateFDP">Date de la séance à rechercher :</label>
    <input type="date" id="stringDate" name="dateFDP" onchange="entrerDate()"> -->

    <div class="form-group row">
            <label for="dateFDP" class="col-sm-2 col-form-label">Date début<span class="obligatoire">*</span></label>
                <div class="col-sm-3">
                    <input class="form-control" type="date" id="stringDate" name="dateFDP"  value="" required onchange="entrerDate()">
                </div>
        </div>







    <!-- Selectionnez la formation : 

    <select id="selectFormation" onchange="selectForm()" >

        ?>
        //<option value="0">Choississez une formation</option>
        <?php

        /* while($data = $listFormation->fetch())
        {
            ?>
                <option value="<?= $data['idFormation']; ?>"><?= $data['libelleFormation']; ?></option>
            <?php
        }
        ?>
         <!-- <input type="submit" name ="btnOkForm" id="btnOkForm" value="OK"> -->
    </select> --> */
    


?>
    <!-- Affichage du select Promotion grace au JS -->

    <div id = "affichelistSeance">
        
    </div>

    <div id = "affichelistSeanceEtudiant">

    </div>

    <!-- <div id="affichePromotion">
        
    </div> -->


    </form>

<?php 

$content = ob_get_clean();
// fin enregistrement est stockee dans $content

require('template.php');

?>