<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET["message"])) {

        $error = $_GET["message"];

        switch ($error) {
            case 'empty':
    ?>
                <div class="erreur">
                    Le champ doit être renseigné.
                </div>
            <?php
                break;
            case 'exist':
            ?>
                <div class="erreur">
                    Erreur d'authentification de l'adresse mail.
                </div>
            <?php
                break;
            case 'success':
            ?>
                <div style="color : green;">Un message vient d'être envoyé à votre adresse mail</div>
    <?php
                break;
        }
    }
    ?>
    <form action="TREATMENT/forgot_password_treatment.php" method="post">
        <label for="email_reset_password">Email</label>
        <input type="email" name="email_reset_password" placeholder="Email adress" required><br><br>
        <input type="submit" name="BtnResetPwd">

    </form>
</body>

</html>