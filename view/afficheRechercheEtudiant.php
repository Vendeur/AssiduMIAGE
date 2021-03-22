<table class = "table table-hover">
    <thead>
        <tr class="table-primary">
            <th scope="col">Civilité</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Formation</th>
            <th scope="col">Promotion</th>
            <th scope="col">Statut</th>
        </tr>
    </thead>
    <tbody>
    <?php
        while($data = $listResultatRecherche->fetch())
            { 
    ?>
            <tr name = <?= $data['idEtu'];?> val = "<?= $data['idEtu'];?>" >

                <td class="clickable"><?= $data['libelleCivil'];?></td>
                <td class="clickable"><?= $data['nomEtu'];?></td>
                <td class="clickable"><?= $data['prenomEtu'];?></td>
                <td class="clickable"><?= $data['libelleFormation'];?></td>
                <td class="clickable"><?= $data['libellePromo'];?></td>
                <td class="clickable"><?= $data['libelleStatut'];?></td>
            </tr>
    <?php
            }
    ?>
    </tbody>
</table>

<script src="js/bilan.js"></script>

        
