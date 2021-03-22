// Déclencheur

$('#searchBar').on('input', function(){
    $('.clickable').html("");
    searchBarBilan();
});

$(#iDSelect")on('change',function(){
    if($(#idDiv).html() != ""){
      APPEL FONCTION
   }
}
   

$('.clickable').on('click', function()
{
    var idEtudiant = $(this).closest('tr').attr('val');

    var dateDebut = $('#dateDebut').val();
    var dateFin = $('#dateFin').val();
    var typeSemestre = $('#typeSem').val();
    //verifier si date voulu est bien saisi
    //Si pas saisi ne pas  faire la requete Ajax
    //Afficher une div avec une erreur
    // console.log(dateVoulu);


    if(dateDebut != "" && dateFin != "")
    {
        displayBilanAbsenceTableau();
    }
    else
    {
        document.getElementById('erreurJs').style.display = "block";
        $('#erreurJs').html("Erreur veuilez remplir tous les champs dates et type semestre");
    } 
});







// Fonction

function displayBilanAbsenceTableau()
{
    document.getElementById('erreurJs').style.display = "none";
        $('#erreurJs').html("");

        $.ajax(
            {
                url: 'controller/recherche_bilan.php',//page du trautement PHP
                method: 'POST', //methode post pour recuperer les valeur avec $_POST['nomDeValeur']
                data:   {
                            Fonction:'afficheInfoEtu', //Appel de la fonction getPromotion
                            idEtu: idEtudiant, //Transmet valeur idFormation qui est la valeur du select
                            dateD: dateDebut,
                            dateF: dateFin,
                            ts: typeSemestre
                        },
    
                success: function(data) 
                {
                    $("#afficheInformationEtu").html(data); //Affichage du prochain select un fois que le traitement est reussis
                }
            });
}
function searchBarBilan()
{
    var contenuRecherche = $('#searchBar').val();

    $.ajax(
        {
            url: 'controller/recherche.php',//page du trautement PHP
            method: 'POST', //methode post pour recuperer les valeur avec $_POST['nomDeValeur']
            data:   {
                        Fonction:'getResultatRecherche', //Appel de la fonction getPromotion
                        rt: contenuRecherche //Transmet valeur idFormation qui est la valeur du select
                    },

            success: function(data) 
            {
                $("#afficheRechercheEtudiant").html(data); //Affichage du prochain select un fois que le traitement est reussis
            }
        });
}

