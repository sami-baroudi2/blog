<?php
// Page par Sami
session_start(); // On ouvre une session.
require_once('../configuration.php');
if (isset($_POST["BtnCo"]))
{
    if (!empty($_POST['login']) and !empty($_POST['password'])) // Avec else, il va afficher un message si des champs ont étés oubliés.
    {
        $login = htmlspecialchars($_POST['login']); // 'htmlspecialchars' une petite sécurité pour éviter d'écrire du HTML sur les champs.
        $password = htmlspecialchars($_POST['password']);
        $grabData = $db->prepare('SELECT * FROM `utilisateurs` WHERE `login` = ?');
        $grabData->execute(array($login));
        $data = $grabData->fetch();
        $row = $grabData->rowCount();
        if ($row > 0)
        {
            if (password_verify($password, $data['password']))
            {
                $_SESSION['login'] = $login;
                $_SESSION['droits'] = $data['droits'];
                $_SESSION['id'] = $data['id'];
                header('location: index_connexion.php?success=login'); // Redirection si l'utilisateur s'est connecté 
                die();
            }
            else
            {
                header('Location:../connexion.php?login_erreur=login');
            }
        }
        else
        {
            header('Location:../connexion.php?login_erreur=login');
        }
    }
    else
    {
        header('Location: ../connexion.php?login_erreur=empty');
    }
}