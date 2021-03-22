<br>
<?php $type = $typeModuleSem->fetch(); ?>
<tr>
	<td>
		Semestre module :
	</td>
	<td>
		<input class="form-control" type="text" id="semestre" name="semestre" size = "10" value="<?= $type['libelleSem']; ?>" class="readOnly" readonly>
	</td>
	<td>
		Type de module :
	</td>
	<td>
		<input class="form-control" type="text" id="typeModule" name="typeModule" value="<?= $type['libelleTCO']; ?>" class="readOnly" readonly>
	</td>
</tr>
<tr>
	<td>
		Abréviation module :
	</td>
	<td>
		<input class="form-control" type="text" id="abv" name="abv" value="<?= $type['abvModule']; ?>" class="readOnly" readonly>
	</td>
	<td>
		Professeur<span class="obligatoire">*</span>
	</td>
	<td>
		<select class="form-control" id="selectProf" name="selectProf" required> <?php// onchange="selectTypeModule()" ?>
		<option value="0">Choississez le professeur</option>
		<?php
			while($data = $listProf->fetch())
			{
				?>
					<option value="<?= $data['numProf'];?>"><?= $data['prof'];?></option>
				<?php
			}
			
		?>
		</select>
	</td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td>
		<input type="submit" class="btn btn-primary" name="btnCreerSeance" value="VALIDER">
	</td>
</tr>