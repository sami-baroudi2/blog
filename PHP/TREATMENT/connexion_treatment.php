<?php
// Page par Jul
session_start();
require_once('../configuration.php');
if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $login = trim(htmlspecialchars($_POST['login']));
    $password = trim(htmlspecialchars($_POST['password']));

    $req = "SELECT * FROM utilisateurs WHERE login = ?";
    $check = $db->prepare($req);
    $check->execute(array($login));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row > 0) {
        if (password_verify($password, $data['password'])) {
            $_SESSION['id'] = $data['id'];
            header('Location:../creer-article.php');
        } else {
            header('Location:../connexion.php?login_erreur=login');
        }
    } else {
        header('Location:../connexion.php?login_erreur=login');
    }
} else {
    header('Location:../connexion.php?login_erreur=empty');
}
