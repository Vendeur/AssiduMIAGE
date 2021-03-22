
<td>
    Promotion : <span class="obligatoire">*</span>
</td>
<td>

    <select class="form-control" id="selectPromoG" name="selectPromoG" onchange="selectFormPromo()" > 
        <option value="0">---------------------------------------------</option><?php
    
        while($data = $listSeanceFormPromoG->fetch())
        {
            ?>
                <option value="<?= $data['idPromo']; ?>"><?= $data['libellePromo']; ?></option>
            <?php
        }
            ?>            
    </select>

</td>
