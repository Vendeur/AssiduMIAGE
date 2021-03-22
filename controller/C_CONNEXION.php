<?php

function affichageConnexion()
{
    require 'view/V_CONNEXION.php';
}

function connexion()
{
    if(isset($_POST['btnConnexion']))
    {
        if(!empty($_POST['user']) AND !empty($_POST['pw']))
        {
            $user =  htmlspecialchars($_POST['user']);
            $pw =  sha1($_POST['pw']);

            $modeleConnexion = new modeleConnexion();
            $rt = $modeleConnexion->verifUser($user, $pw);

            if($rt->rowCount() == 1)
            {
                $rt = $rt->fetch();
                
                $_SESSION['idUser'] = $rt['idUser'];
                $_SESSION['nomUser'] = $rt['nomUser'];
                $_SESSION['prenomUser'] = $rt['prenomUser'];
                $_SESSION['permissionUser'] = $rt['permissionUser'];
                header('Refresh:0');
            }

            else {
                
                $_POST['error'] = 'Utilsateur introuvable !';
            }
        }

        else {
            
            $_POST['error'] = 'Une erreur est survenu !';
        }
    }
}

function deconnexion()
{
    session_destroy();
    header('Refresh:0');
}