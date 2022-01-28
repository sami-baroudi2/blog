
<?php

require_once('../configuration.php');

$message = "";

if (empty($_GET['token'])) {
    header('Location:../recuperation.php?token=notoken');
}

$req = $db->prepare('SELECT date_recuperation_pwd FROM utilisateurs WHERE token_recuperation = ?');
$req->bindValue(1, $_GET['token']);
$req->execute();
$row = $req->fetch(PDO::FETCH_ASSOC);

if (empty($row)) {
    header('Location:../recuperation.php?token=exist');
}

$dateToken = strtotime('+1 hours', strtotime($_GET['date_recuperation_pwd']));
$dateToday = time();

if ($dateToken < $dateToday) {
    header('Location:../recuperation.php?token=expired');
}
$Newpass = htmlspecialchars($_POST['ResetPass']);
$Newpassconfirm = htmlspecialchars($_POST['ResetPassConfirm']);
if (empty($_POST["BtnReset"])) {
    if (!empty($Newpass) && !empty($Newpassconfirm)) {
        if ($Newpass === $Newpassconfirm) {
            $password = password_hash($Newpass, PASSWORD_DEFAULT);
            $requete = $db->prepare('UPDATE utilisateurs SET password = ?, token_recuperation = "" WHERE token_recuperation = ?');
            $requete->bindValue(1, $Newpass);
            $requete->bindValue(2, $_GET['token']);
            $requete->execute();

            header('Location:../connexion.php?login_erreur=change');
        } else {
            header('Location:../recuperation.php?token=pass');
        }
    } else {
        header('Location:../recuperation.php?token=empty');
    }
}
