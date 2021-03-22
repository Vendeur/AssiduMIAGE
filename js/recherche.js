function selectForm()
{
    $('#affichePromotion').html(''); // Initialise ce qu'il y'a en dessous
	$('#afficheEleve').html('');
    $('#afficheModuleProf').html('');
    $('#afficheModule').html('');

    var idForm = $('#selectFormation').val(); // Récup valeur du select

        $.ajax(
            {
                url: 'controller/recherche.php',//page du trautement PHP
                method: 'POST', //methode post pour recuperer les valeur avec $_POST['nomDeValeur']
                data:   {
                            Fonction:'getPromotion', //Appel de la fonction getPromotion
                            idFormation: idForm //Transmet valeur idFormation qui est la valeur du select
                        },

                success: function(data) 
                {
                    $("#affichePromotion").html(data); //Affichage du prochain select un fois que le traitement est reussis
                }
            });
}

function validerPromo()
{
    var idPromo = $('#selectPromotion').val(); // Récup valeur du select promotion
    var idSeance = $('#selectSeance').val(); // Récup valeur du select promotion
    var dateSeance = $('#dateSeance').val();
    var duree = $('#heureSeance').val() + "-" + $('#minuteSeance').val();
    var idFicheAppel = $('#selectFicheAppel').val();
    var idModule = $('#selectModule').val();

    window.location.href = "?page=etudiant&idPromo=" + idPromo
                            +"&idEtu=" + idEtu
                            +"&idSeance=" + idSeance
                            +"&dateSeance=" + dateSeance
                            +"&dureeSeance=" + duree
                            +"&idFicheAppel=" + idFicheAppel
                            +"&idModule=" +idModule;

}

function selectModuleCR()
{
    $('#affichePromotion').html(''); // Initialise ce qu'il y'a en dessous
	$('#afficheEleve').html('');
    $('#afficheModuleProf').html('');

    var idModule = $('#selectModule').val(); // Récup valeur du select
        $.ajax(
            {
                url: 'controller/recherche.php',//page du trautement PHP
                method: 'POST', //methode post pour recuperer les valeur avec $_POST['nomDeValeur']
                data:   {
                            Fonction:'getModule', //Appel de la fonction getPromotion
                            idModule: idModule //Transmet valeur idFormation qui est la valeur du select
                        },

                success: function(data) 
                {
                    $("#afficheProf").html(data); //Affichage du prochain select un fois que le traitement est reussis
                    // $("#afficheTypeModule").html(data); //Affichage du prochain select un fois que le traitement est reussis
                }
            });
}

function selectModuleCR()
{
    // $('#affichePromotion').html(''); // Initialise ce qu'il y'a en dessous
	// $('#afficheModuleProf').html('');

    var idModule = $('#selectModule').val(); // Récup valeur du select
        $.ajax(
            {
                url: 'controller/recherche.php',//page du trautement PHP
                method: 'POST', //methode post pour recuperer les valeur avec $_POST['nomDeValeur']
                data:   {
                            Fonction:'getModule', //Appel de la fonction getPromotion
                            idModule: idModule //Transmet valeur idFormation qui est la valeur du select
                        },

                success: function(data) 
                {
                    $("#afficheModuleProf").html(data); //Affichage du prochain select un fois que le traitement est reussis
                    // $("#afficheTypeModule").html(data); //Affichage du prochain select un fois que le traitement est reussis
                }
            });
}

function selectPromoModule()
{
    $('#afficheModuleProf').html('');

    var idPromo = $('#selectPromotion').val(); // Récup valeur du select
        $.ajax(
            {
                url: 'controller/recherche.php',//page du trautement PHP
                method: 'POST', //methode post pour recuperer les valeur avec $_POST['nomDeValeur']
                data:   {
                            Fonction:'getModulePromo', //Appel de la fonction getPromotion
                            idPromo: idPromo //Transmet valeur idFormation qui est la valeur du select
                        },

                success: function(data) 
                {
                    $("#afficheModule").html(data); //Affichage du prochain select un fois que le traitement est reussis
                    // $("#afficheTypeModule").html(data); //Affichage du prochain select un fois que le traitement est reussis
                }
            });
}


function entrerDate()
{
    $('#affichelistSeance').html('');
    $('#affichelistSeanceEtudiant').html('');

    var dateF = $('#stringDate').val(); // Récup valeur du select
        $.ajax(
            {
                url: 'controller/recherche.php',//page du trautement PHP
                method: 'POST', //methode post pour recuperer les valeur avec $_POST['nomDeValeur']
                data:   {
                            Fonction:'getListSeance', //Appel de la fonction getPromotion
                            dateFDP: dateF //Transmet valeur idFormation qui est la valeur du select
                        },

                success: function(data) 
                {
                    $("#affichelistSeance").html(data); //Affichage du prochain select un fois que le traitement est reussis
                    // $("#afficheTypeModule").html(data); //Affichage du prochain select un fois que le traitement est reussis
                }
            });
}


function selectSeanceFDP()
{
    // $('#afficheModuleProf').html('');

    var idSeance = $('#selectSeance').val(); // Récup valeur du select
        $.ajax(
            {
                url: 'controller/recherche.php',//page du trautement PHP
                method: 'POST', //methode post pour recuperer les valeur avec $_POST['nomDeValeur']
                data:   {
                            Fonction:'getListSeanceEtudiant', //Appel de la fonction getPromotion
                            idSeance: idSeance //Transmet valeur idFormation qui est la valeur du select
                        },

                success: function(data) 
                {
                    $("#affichelistSeanceEtudiant").html(data); //Affichage du prochain select un fois que le traitement est reussis
                    // $("#afficheTypeModule").html(data); //Affichage du prochain select un fois que le traitement est reussis
                }
            });
}





function entrerDateG()
{
    $('#affichelistFormG').html('');
    $('#affichelistFormPromo').html('');
    $('#affichelistFormPromoGM3').html(''); 
    $('#affichelistFormPromoFicheDePresence').html(''); 

    var dateF = $('#stringDate').val(); // Récup valeur du select
        $.ajax(
            {
                url: 'controller/recherche.php',//page du trautement PHP
                method: 'POST', //methode post pour recuperer les valeur avec $_POST['nomDeValeur']
                data:   {
                            Fonction:'getListPromoG', //Appel de la fonction getPromotion
                            dateG: dateF //Transmet valeur idFormation qui est la valeur du select
                        },

                success: function(data) 
                {
                    $("#affichelistFormG").html(data); //Affichage du prochain select un fois que le traitement est reussis
                    // $("#afficheTypeModule").html(data); //Affichage du prochain select un fois que le traitement est reussis
                }
            });
}


function selecPromoG()
{
    $('#affichelistFormPromo').html('');
    $('#affichelistFormPromoGM3').html(''); 
    $('#affichelistFormPromoFicheDePresence').html('');

    var formG = $('#selectFormationG').val(); // Récup valeur du select
    var dateG = $('#stringDate').val();
        $.ajax(
            {
                url: 'controller/recherche.php',//page du trautement PHP
                method: 'POST', //methode post pour recuperer les valeur avec $_POST['nomDeValeur']
                data:   {
                            Fonction:'getListSeanceFormPromoG', //Appel de la fonction getPromotion
                            date: dateG,
                            form: formG, //Transmet valeur idFormation qui est la valeur du select
                            
                        },

                success: function(data) 
                {
                    $("#affichelistFormPromo").html(data); //Affichage du prochain select un fois que le traitement est reussis
                }
            });
}











function selectFormPromo()
{
    $('#affichelistFormPromoGM3').html(''); 
    $('#affichelistFormPromoFicheDePresence').html('');


    var formG = $('#selectFormationG').val(); // Récup valeur du select
    var dateG = $('#stringDate').val();
    var promoG = $('#selectPromoG').val();

        $.ajax(
            {
                url: 'controller/recherche.php',//page du trautement PHP
                method: 'POST', //methode post pour recuperer les valeur avec $_POST['nomDeValeur']
                data:   {
                            Fonction:'getListSeanceFormPromoG3', //Appel de la fonction getPromotion
                            date: dateG,
                            form: formG, //Transmet valeur idFormation qui est la valeur du select
                            promo: promoG
                            
                        },

                success: function(data) 
                {
                    $("#affichelistFormPromoGM3").html(data); //Affichage du prochain select un fois que le traitement est reussis
                }
            });
}






function selectFormPromoFicheDePresence()
{
    $('#affichelistFormPromoFicheDePresence').html('');

    var idSeanceG = $('#selectFicheDePresence').val(); // Récup valeur du select
    //var dateG = $('#stringDate').val();
    //var promoG = $('#selectPromoG').val();
    //var numG = $('#selectFicheDePresence').val();

        $.ajax(
            {
                url: 'controller/recherche.php',//page du trautement PHP
                method: 'POST', //methode post pour recuperer les valeur avec $_POST['nomDeValeur']
                data:   {
                            Fonction:'getListSeanceFormPromoFicheDePresence', //Appel de la fonction getPromotion
                            numSeance: idSeanceG,
                        },

                success: function(data) 
                {
                    $("#affichelistFormPromoFicheDePresence").html(data); //Affichage du prochain select un fois que le traitement est reussis
                }
            });
}












