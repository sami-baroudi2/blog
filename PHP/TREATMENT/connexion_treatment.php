<?php
session_start(); // On ouvre une session.
require_once('configuration.php');
if(isset($_POST['Connexion']))
{
    if(!empty($_POST['login']) AND!empty($_POST['password'])) // Avec else, il va afficher un message si des champs ont étés oubliés.
    {
        $login = htmlspecialchars($_POST['login']); // 'htmlspecialchars' une petite sécurité pour éviter d'écrire du HTML sur les champs.
        $password = htmlspecialchars($_POST['password']);
        // Je ne mettrais pas de chiffrement du mot de passe pour faciliter la correction (même si nous pouvons déchiffrer facilement) pour éviter de perdre du temps de à chaque fois c/c le mdp et le décrypter.
        $grabData = $bdd->prepare('SELECT * FROM `utilisateurs` WHERE `login` = ? AND `password` = ?');
        $grabData->execute(array($login, $password));
        if($grabData->rowCount() > 0)
        {
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $grabData->fetch()['id'];
            header('location: session.php'); // Redirection si l'utilisateur s'est connecté (Changer "session.php" par le nom du ficiher PHP qui redirige vers la session.)
        }
        else
        {
            echo "Le login ou le mot de passe est incorrect !"; // Le message en cas de mot de passe et/ou d'identifiants incorrects.
        }
    }
    else
    {
        echo "Tous les champs doivent être remplis"; // Le message des champs oubliés.
    }
}