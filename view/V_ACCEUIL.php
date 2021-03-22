<?php

ob_start();//début de l'enregistrement dans vairable

$title = 'Accueil';

?>


<center>
    <h1>
        Bienvenue <?= $_SESSION['nomUser']." ".$_SESSION['prenomUser'];?>
    </h1>
</center>

<br>
<br>
<p class="text-left">Bonjour <?= $_SESSION['prenomUser'];?> ! &#128513; <br> <br>
Bienvenue sur Assidu MIAGE &#128526; <br> <br>
La nouvelle application, cette application est là pour deux raisons : <br>

<ul>
<li>La 1re pour centraliser les absences de tous les étudiants de la MIAGE !</li>
<li>La seconde te faciliter la tâche pour les saisies des assiduités  &#128521;</li>
</ul>


C'est très simple à l'utiliser !<br> <br>
<ol>
<li><strong> 1re étape </strong>: sous la rubrique <i>" CRÉER SÉANCE "</i>, comme son nom l'indique, tu crées la/les séance(s) concerner avec toutes les informations nécessaires. <br></li><br>
<li> <strong> 2nd étape </strong> : ensuite, après avoir créé la séance, il faudra aller dans l'onglet <i>" FICHE DE PRÉSENCE "</i>, tu recherches la séance (que tu as créée juste avant) grâce à la date, et tu choisi la séance dans la liste déroulante parmi toutes les séances qui concernent la date saisie. <br>
Ensuite, il te faudra juste de saisir tous les statuts de chaque étudiant et de valider ! <br></li><br>
<li><strong>3e étape </strong>: une erreur sur un statut d'un élève ? L'élève a fourni un justificatif pour son/ses absence(s) au cours manqué ?
Pas de panique ! <br> La rubrique <i>" GESTION "</i> est là pour ça, il faudra faire la même manipulation que sur la page <i>" FICHE DE PRÉSENCE "</i>, tu saisis la date de la séance, la formation et la promotion concernée et après, tu pourras modifier les états des étudiants sans souci. <br></li><br>
<li><strong>Et pour finir</strong>, pour faire un bilan d'absence (ABI et/ou ABJ) d'un étudiant, il faut accéder à la catégorie <i>" BILAN "</i>, il faudra saisir l'intervalle de dates pour le bilan, le type de semestres (Pair, Impaire ou bien les deux &#128521;) et de rechercher l'étudiant grâce à son nom ou prénom. <br>
Et par la suite, tu pourras générer un fichier PDF qui résumera toutes ses absences en 1 seul clic.</li>
</ol>

<br>

<p class="font-italic">Le service informatique.</p>

</p>

<?php 

$content = ob_get_clean();//fin enregistrement est stockee dans $content

require('template.php');

?>