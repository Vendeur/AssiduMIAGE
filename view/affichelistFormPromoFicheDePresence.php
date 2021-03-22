<?php $data = $userSeance->fetch(); ?>
<?php $etatFA = $etatFA->fetch(); ?>

        <div class="form-group row">
            <label for="user" class="col-sm-2 col-form-label">Crée par</label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" id="user" name="user" value="<?= $data['User']; ?>" class="readOnly" readonly>
                </div>
        </div>

        <div class="form-group row">
            <label for="etatFA" class="col-sm-2 col-form-label">État de la fiche</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" id="etatFA" name="etatFA" value="<?= $etatFA['libelleFA']; ?>" class="readOnly" readonly>
                </div>
        </div>

</br>
<table border='2' class = "table">
<thead class="thead-dark">
   <tr>
       <th scope="col"><center>Nom</center></th>
       <th scope="col"><center>Prénom</center></th>
       <th scope="col"><center>État</center></th>
   </tr>
</thread>
   <?php while($data = $listSeanceFormPromoFicheDePresence->fetch())
        {
            ?>
        <tr>
        <input id="numeroEtudiant" name="numeroEtudiant[]" type="hidden" value="<?= $data['idEtu']; ?>">
            <td><center><?= $data['nomEtu']; ?></center></td>
            <td><center><?= $data['prenomEtu'];?></center></td>
            </td>
					<td>
						<center>
							<select class="form-control" id = "selectEtat" name = "selectEtat[]">
                                <option value="<?= $data['numEtat'];?>"><?= $data['libelleEtat'];?></option>
                                <?php
                                    foreach ($tableEtat as $key => $value) 
                                    {
                                        if($value[0] != $data['numEtat'])
                                        {
                                        ?>
                                            <option value="<?= $value[0];?>"><?= $value[1];?></option>
                                        <?php
                                        }
                                    }
                                ?>
        ?>                  </select>
						</center>
                    </td>
        </tr><?php
        } 
?>
        
   
</table></br>
<center><input type="submit" class="btn btn-primary" name="btnMiseAJourAssduiter" value="MISE A JOUR FICHE DE PRESENCE"></center>
