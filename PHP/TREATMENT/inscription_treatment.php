<?php
// Page par Sami
require_once('../configuration.php');

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirmation']) && !empty($_POST['email'])) {


    $login = stripslashes($_POST['login']);
    $login = htmlspecialchars($login);

    $email = stripslashes($_POST['email']);
    $email = htmlspecialchars($email);

    $password = stripslashes($_POST['password']);
    $password = htmlspecialchars($password);

    $confirmation = stripslashes($_POST['confirmation']);
    $confirmation = htmlspecialchars($confirmation);

    $checkmail = $db->prepare('SELECT login , password , email FROM utilisateurs WHERE email = ?');
    $checkmail->execute(array($email));
    $datamail = $checkmail->fetch();
    $rowmail = $checkmail->rowCount();

    if ($rowmail == 0) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $check = $db->prepare('SELECT login , password , email FROM utilisateurs WHERE login = ?');
            $check->execute(array($login));
            $data = $check->fetch();
            $row = $check->rowCount();

            if ($row == 0) {
                if ($password === $confirmation) {

                    $hash =  password_hash($password, PASSWORD_DEFAULT);

                    $req = "INSERT INTO utilisateurs (login , password, email , droits) VALUES (:login , :hash , :email , :droits)";
                    $result = $db->prepare($req);
                    $result->bindValue(':login', $login);
                    $result->bindValue(':hash', $hash);
                    $result->bindValue(':email', $email);
                    $droits = 1;
                    $result->bindValue(':droits', $droits);
                    $result->execute();
                    header('Location:../index_connexion.php?login_err=success');
                } else {
                    header('Location:../inscription.php?inscription_err=password');
                }
            } else {
                header('Location:../inscription.php?inscription_err=already');
            }
        } else {
            header('Location:../inscription.php?inscription_err=email');
        }
    } else {
        header('Location:../inscription.php?inscription_err=alreadymail');
    }
} else {
    header('Location:../inscription.php?inscription_err=empty');
}
