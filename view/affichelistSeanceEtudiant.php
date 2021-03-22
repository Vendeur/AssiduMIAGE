<table class = "table table-striped">

    <thead>
        <tr class="table-active">
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Etat</th>
        </tr>
    </thead>
   <tbody>
   <?php while($data = $listSeanceEtudiant->fetch())
        {
            ?>
        <tr>
        <input id="numeroEtudiant" name="numeroEtudiant[]" type="hidden" value="<?= $data['idEtu']; ?>">
            <td><?= $data['nomEtu']; ?></td>
            <td><?= $data['prenomEtu']?></td>
            </td>
					<td>
						<center>
							<select  class="form-control" id = "selectEtat" name = "selectEtat[]">
                               <!-- <option value = "0">-----------</option> -->
                                <?php 
                                    foreach($tableEtat as $key=>$data) 
                                        {
                                            ?>
                                                <option value="<?= $data[0];?>"><?= $data[1];?></option>
                                            <?php     
                                        }
        ?>                  </select>
						</center>
                    </td>
        </tr><?php
        } 
   ?>

<tr>
	<td></td>
	<td></td>
	<td>
        <input type="submit" class="btn btn-primary" name="btnCreerAssiduiter" value="VALIDER ASSIDUITER">
	</td>
</tr>
   </tbody>
</table>
