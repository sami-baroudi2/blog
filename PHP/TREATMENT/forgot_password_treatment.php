<?php
// Page par Sami
require("../configuration.php");
$message = '';
if (isset($_POST['BtnResetPwd'])) {
    if (!empty($_POST['email_reset_password'])) {
        $email = htmlspecialchars($_POST['email_reset_password']);

        $statement = $db->prepare('SELECT count(*) AS nb FROM utilisateurs WHERE email = ?');
        $statement->execute(array($email));
        $statement->execute();

        $line = $statement->fetch(PDO::FETCH_ASSOC);

        if (!empty($line) && $line['nb'] > 0) {
            $str = implode('', array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9)));
            $token = substr(str_shuffle($str), 0, 20);

            $statement = $db->prepare('UPDATE utilisateurs SET date_recuperation_pwd = NOW(), token_recuperation = ? WHERE email = ?');
            $statement->bindValue(1, $token);
            $statement->bindValue(2, $email);
            $statement->execute();

            $link = "localhost/blog/PHP/TREATMENT/recuperation_treatment.php?token=token";
            $to = $email;
            $subject = "Réinitialition de votre mot de passe";
            $message = "<h1>Réinitialisation de votre mot de passe</h1><br><br>
            <p>Veuillez rentrer ce token : $token dans la page qui suit : $link</p>";

            $header = [];
            $header[] = "MIME-Version 1.0";
            $header[] = "Content-type : text/html; charset=utf-8";
            $header[] = "To: $to";
            $header[] = "From: no-reply@laplateforme.io";

            mail($to, $subject, $message, implode("r/n", $header));
            header('Location:../forgot_password.php?message=success');
        } else {
            header('Location:../forgot_password.php?message=exist');
        }
    } else {
        header('Location:../forgot_password.php?message=empty');
    }
}