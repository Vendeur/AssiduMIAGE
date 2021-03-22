<html>
    <head>
        <title>Authentification</title>
        <link rel="stylesheet" href="./style/connexion.css">
    </head>
    <body>
        <form action="?connexion" method="post">
        <div class = "formConnexion">
            <h1>Identifiez-vous</h1>
            <input type="text" name="user" placeholder="Entrez votre nom d'utilisateur">
            <br>
           <input type="password" name="pw"  placeholder="Entrez votre mot de passe">
            <br>
            <input type="submit" name ="btnConnexion" value="CONNEXION">
            <?php 
            if(isset($_POST['error']))
            {
                echo '<div class = "erreur">'. $_POST['error']. '</div>';
            }
            ?>
        </div>  
        </form>
    </body>
</html>