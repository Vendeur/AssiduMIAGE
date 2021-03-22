<?php 
// require './Include/Bibliotheque.php';

ob_start(); //début de l'enregistrement dans variable

$title = "Création d'une séance";

?>

<center>
    <h1>
        Création d'une séance
    </h1>
    </br>
    </br>
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

    <form action="?page=CreerSeance" method="POST">
        <table>
            <!-- <tr>
                <td>
                    <label for="dateCreneau">Date de la séance<span class="obligatoire">*</span></label>
                </td>
                <td>
                    <input type="date" id="dateCreneau" name="dateCreneau" required value="<?= date('Y-m-d');?>">
                </td>
            </tr> -->


            <div class="form-group row">
                <label for="dateCreneau" class="col-sm-2 col-form-label">Date de la séance<span class="obligatoire">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control" type="date" id="dateCreneau" name="dateCreneau"  value="<?= date('Y-m-d');?>" required autofocus>
                    </div>
            </div>






           <!--  <tr>
                <td>
                <label for="heureCreneau">Heure début du cours<span class="obligatoire">*</span></label>
                </td>
                <td>
                <input type="time" id="heureCreneau" name="heureCreneau" required>
                </td>
            </tr>
 -->
            
            <div class="form-group row">
                <label for="heureCreneau" class="col-sm-2 col-form-label">Heure début du cours<span class="obligatoire">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control" type="time" id="heureCreneau" name="heureCreneau" required>
                    </div>
            </div>













            <!-- <tr>
                <td>
                <label for="dureeCreneau">Durée du cours<span class="obligatoire">*</span></label>
                </td>
                <td>
                    <input type="time" id="dureeCreneau" name="dureeCreneau" required>
                </td>
            </tr> -->

            <div class="form-group row">
            <label for="dureeCreneau" class="col-sm-2 col-form-label">Durée du cours<span class="obligatoire">*</span></label>
                <div class="col-sm-3">
                    <input class="form-control" type="time" id="dureeCreneau" name="dureeCreneau" required>
                </div>
        </div>










            <tr>
                <td>
                Appel intervenant reçu ?<span class="obligatoire">*</span> 
                </td>
                <td>
                <select class="form-control" name="FA" required>
                    <option value="0">--------------</option><?php
                    
                    while($data = $listFA->fetch())
                    {
                        ?>
                            <option value="<?= $data['numFA']; ?>"><?= $data['libelleFA']; ?></option>
                        <?php
                    }
                        ?>
                </select>
                </td>
            </tr>

            <br>



 












            <tr>
                <td>
                Selectionnez la formation<span class="obligatoire">*</span>
                </td>
                <td>
                <select class="form-control" id="selectFormation" name= "selectFormation" onchange="selectForm()" required>
<br>
                ?>
                <option value="0">Choississez une formation</option>
                <?php

                while($data = $listFormation->fetch())
                {
                    ?>
                        <option value="<?= $data['idFormation']; ?>"><?= $data['libelleFormation']; ?></option>
                    <?php
                }
                ?>
                </select>
                </td>
            </tr>






            <tr id="affichePromotion">

            </tr>
            <tr id="afficheModule">

            </tr>
        </table>
        <table id="afficheModuleProf">

        </table>
    </form>
</div>
<?php 

$content = ob_get_clean();
// fin enregistrement est stockee dans $content

require('template.php');

?>