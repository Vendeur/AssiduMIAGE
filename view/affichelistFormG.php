</br>
Résultat : <?php echo $count . ' fiche(s) de présence(s) trouver !';?>
</br>
<?php if($count == 0)
    {
        echo '';
    }

    else { ?>
<td>
    Formation : <span class="obligatoire">*</span>
</td>
<td>
    <select class="form-control" id="selectFormationG" name="selectFormationG" onchange="selecPromoG()" > 
        <option value="0">---------------------------------------------</option><?php
        while($data = $listSeanceG->fetch())
        {
            ?>
                <option value="<?= $data['idFormation']; ?>"><?= $data['libelleFormation']; ?></option>
            <?php
        }
            ?>            
    </select><?php
    } ?>
</td>