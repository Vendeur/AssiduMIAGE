<td>
	Selectionnez la promotion<span class="obligatoire">*</span> 
</td>
<td>
	<select  class="form-control" id="selectPromotion" name="selectProm" onchange="selectPromoModule()">

		<option value="0">Choississez une promotion</option>
		<?php
			while($data = $listPromotion->fetch())
			{
				?>
					<option value="<?= $data['idPromo'];?>"><?= $data['libellePromo'];?></option>
				<?php
			}
		?>
	</select>
</td>

<!-- <input type="button" value="Valider" onclick="validerPromo()"> -->