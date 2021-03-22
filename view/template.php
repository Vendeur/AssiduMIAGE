<html>
    <head>
        <title><?= $title;?></title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style/main.css">
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="?page=accueil">Assidu MIAGE</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?page=accueil">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?page=CreerSeance">Créer séance</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?page=fdp">Fiche de présence</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?page=gestion">Gestion</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?page=bilan">Bilan</a></li>

                        <li class="nav-item">
                            <form action="?deconnexion" method="POST">
								<input class="btn btn-outline-light" type="submit" name="deconnexion" value="Déconnexion">
							</form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="overlay">
        </div>

        <div class="container">
            <?= $content;?>
        </div>
        
    </body>

    
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="js/recherche.js"></script>
    <script src="js/bilan.js"></script>
</html>