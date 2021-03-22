<?php
require './Include/Bibliotheque.php';

ob_start(); //début de l'enregistrement dans variable

$title = 'Gestion des présences';

?>

<center>
    <h1>
    Gestion des présences
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

<div class="container">
    <form action ="" method = "post">
    <H4>Rechercher fiche de présence</H4></br>
<!-- 
    <label for="dateFDP">Date de la séance à rechercher :<span class="obligatoire">*</span></label>
        <input type="date" id="stringDate" name="dateG" onchange="entrerDateG()"> -->

        <div class="form-group row">
            <label for="dateFDP" class="col-sm-2 col-form-label">Date de la séance à rechercher :<span class="obligatoire">*</span></label>
                <div class="col-sm-3">
                    <input class="form-control" type="date" id="stringDate" name="dateG" required onchange="entrerDateG()">
                </div>
        </div>

    </br>
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
    <!-- Affichage du select Formation grace au JS -->

    <div id = "affichelistFormG">
        
    </div>

    <div id = "affichelistFormPromo">

    </div>

   <div id = "affichelistFormPromoGM3">
        
    </div>

    <div id = "affichelistFormPromoFicheDePresence">

    </div>


    </form>
</div>

<?php 

$content = ob_get_clean();
// fin enregistrement est stockee dans $content

require('template.php');

?>