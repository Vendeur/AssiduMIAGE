<?php $data = $infoEtu->fetch();?>
<?php $typeSem = $infoSemestre->fetch();?>
<?php $totalABI = $listTotalABI->fetch();?>
<?php $totalABJ = $listTotalABJ->fetch();?>

<input id="numeroEtu" name="numeroEtu" type="hidden" value=<?= $data['idEtu'];?>>

    <center>
        <h1>
            Bilan d'absence de <?= $data['nomEtu'];?> <?= $data['prenomEtu'];?></br>
        </h1>

        <h5>
            Pour la période : <?= $dateD;?> au <?= $dateF;?></br>
            Pour les matières du semestre : <?php if ($typeSem['libelleType'] != "Pair" && $typeSem['libelleType'] != "Impair")
                                                {
                                                    echo 'Pair et Impair';
                                                }
                                                else {
                                                    echo $typeSem['libelleType'];
                                                }
            ?> 
        </h5>
    </center>

<?php if($countTT == 0)
        {
            echo '<center><h5>Aucune ABI et ABJ cette élève.</h5></center>';
        }
        else { ?>
<br>
<table class = "table table-striped" >
    <thead>
        <tr class="table-danger">
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Module</th>
            <th scope="col">Semestre</th>
            <th scope="col">Type</th>
            <th scope="col">ABI (nombre)</th>
            <th scope="col">ABI (Volume)</th>
        </tr>
    </thead>
    <tbody>
    <?php

$TTNombreABI = 0;

        while($data = $listBilanABI->fetch())
            {
    ?>
                <tr val="<?= $data['idSeance'];?>">
                    <td><?= $data['dateSeance'];?></td>
                    <td><?= $data['heureSeance'];?></td>
                    <td><?= $data['libelleModule'];?></td>
                    <td><?= $data['libelleSem'];?></td>
                    <td><?= $data['libelleType'];?></td>
                    <td><?= $data['Nombre ABI'];?></td>
                    <td><?= $data['Volume ABI'];?></td>
                    
<?php               $TTNombreABI += $data['Nombre ABI'];
            ?>
<?php            }



if($countABI == 0)
{?>
    <tr class="table-secondary">
            <td colspan="5">Aucune ABI</td>
            <td class="font-weight-bold"></td>
            <td class="font-weight-bold"></td>
        </tr>
<?php
}

else 
{
    ?>
        <tr class="table-secondary">
            <td colspan="5">Total</td>
            <td class="font-weight-bold"><?=$TTNombreABI;?></td>
            <td class="font-weight-bold"><?=$totalABI['TotalABI'];?> min</td>
        </tr>
            </tr>
    <?php
}

                              
?>
    </tbody>
</table>







<table class = "table table-striped" >
    <thead>
        <tr class="table-warning">
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Module</th>
            <th scope="col">Semestre</th>
            <th scope="col">Type</th>
            <th scope="col">ABJ (nombre)</th>
            <th scope="col">ABJ (Volume)</th>
        </tr>
    </thead>
    <tbody>
    <?php

$TTNombreABJ = 0.00;

        while($data = $listBilanABJ->fetch())
            {
    ?>
                <tr val="<?= $data['idSeance'];?>">

                    <td><?= $data['dateSeance'];?></td>
                    <td><?= $data['heureSeance'];?></td>
                    <td><?= $data['libelleModule'];?></td>
                    <td><?= $data['libelleSem'];?></td>
                    <td><?= $data['libelleType'];?></td>
                    <td><?= $data['Nombre ABJ'];?></td>
                    <td><?= $data['Volume ABJ'];?></td>
                    
<?php               $TTNombreABJ += $data['Nombre ABJ'];
            ?>
<?php            }
?>

<?php if($countABJ == 0)
{?>
    <tr class="table-secondary">
            <td colspan="5">Aucune ABJ</td>
            <td class="font-weight-bold"></td>
            <td class="font-weight-bold"></td>
        </tr>
<?php
}
else {
    ?><tr class="table-secondary">
            <td colspan="5">Total</td>
            <td class="font-weight-bold"><?=$TTNombreABJ;?></td>
            <td class="font-weight-bold"><?=$totalABJ['TotalABJ'];?> min</td>
        </tr>
            </tr>

    <?php                        

}
        ?>
<tr>
    <td colspan="6">
    <td><input type="submit" class="btn btn-primary" name="btnCreerPDF" value="GENERER PDF"></td>		
</tr>

    </tbody>
</table>

<?php 
        }
?>

<script src="js/bilan.js"></script>


        
