</br>
Résultat : <?php echo $count . ' fiche(s) de présence trouver !';?>
</br>
<?php if($count == 0)
    {
        echo '';
    }

    else { ?>
        Choississez : <span class="obligatoire">*</span>

<select  class="form-control" id = "selectFicheDePresence" name="selectFicheDePresence" onchange="selectFormPromoFicheDePresence()">

    <option value="0">Selectionner la fiche de présence concerner</option>
 <?php
        while($data = $listSeanceFormPromoGM3->fetch()) 
            {
                ?>
                    <option value="<?= $data['idSeance']; ?>">
                        <?= $data['gestion'];?>
                    </option>
                    
                <?php
            }
        ?>
</select> <?php
?><?php
    }
    
?></br>




