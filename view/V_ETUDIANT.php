<?php
require './Include/Bibliotheque.php';

ob_start(); //début de l'enregistrement dans variable

$title = 'Liste des élèves';

?>

<center>
    <h1>
        Liste des élèves
    </h1>
</center>

<form action="" method="post">
    <table>
            <thead>
                <tr>
                    <th>
                        Nom
                    </th>
                    <th>
                        Prénom
                    </th>
                    <th>
                        Statut
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($data = $lstEtudiant->fetch())
                {
                    ?>
                        <tr>
                            <td><?= $data['nomEtu'];?></td>
                            <td><?= $data['prenomEtu'];?></td>
                            <td>
                                <select name="statutEtu[]">
                                    <option value="Présent">Présent</option>
                                    <option value="Absent">Absent</option> 
                                </select>
                            </td>
                        </tr>
                    <?php
                }
            ?>
            </tbody>
    </table>
    <input type="submit" value="Valider" name="validerStatutEtu">
</form>


<?php 

$content = ob_get_clean();
// fin enregistrement est stockee dans $content

require('template.php');

?>