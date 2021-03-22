

<?php if($count == 0)
    {
        echo 'Résultat : ' . $count . " séance sans assiduité n'a était trouver pour cette date !";
    }

    else { 
?>
        Résultat : <?php echo $count . " séance(s) sans assiduité à était trouver pour cette date !";?> </br>
        
        
        Choississez la séance : 

<select class="form-control" id = "selectSeance" name="selectSeance" onchange="selectSeanceFDP()">
    <option value="0">Selectionner la séance</option>
        <?php 
        while($data = $listSeance->fetch()) 
            {
                ?>
                    <option value="<?= $data['idSeance']; ?>">
                        <?= $data['NPAH'];?>
                    </option>
                    
                <?php
            }
        ?>
</select> <?php
?><?php
    }
    
?></br>




