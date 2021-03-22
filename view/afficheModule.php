<td>
    Module<span class="obligatoire">*</span>
</td>
<td>
    <select class="form-control" id="selectModule" name="selectModule" onchange="selectModuleCR()" > 
        <option value="0">---------------------------------------------</option><?php
    
        while($data = $listPromoModule->fetch())
        {
            ?>
                <option value="<?= $data['idModule']; ?>"><?= $data['libelleModule']; ?></option>
            <?php
        }
            ?>            
    </select>
</td>