<!DOCTYPE html>
<html lang="en">
<!-- Page par Sami -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
</head>

<body>

    <?php

    if (isset($_GET["inscription_err"])) {

        $error = $_GET["inscription_err"];

        switch ($error) {
            case 'empty':
    ?>
                <div class="erreur">
                    Tous champs doivent être remplis pour procéder à l'inscription.
                </div>
            <?php
                break;
            case 'alreadymail':
            ?>
                <div class="erreur">
                    Cette adresse possède déjà un compte enregistré.
                </div>
            <?php
                break;
            case 'email':
            ?>
                <div class="erreur">
                    Veuillez saisir une adresse mail valide.
                </div>
            <?php
                break;
            case 'already':
            ?>
                <div class="erreur">
                    Ce nom d'utilisateur (login) est déjà attribué.
                </div>
            <?php
                break;
            case 'password':
            ?>
                <div class="erreur">
                    Veuillez saisir deux mots de passes identiques.
                </div>
    <?php
                break;
        }
    }

    ?>

    <form action="TREATMENT/inscription_treatment.php" method="POST">
        <label for="login">Login</label>
        <input type="text" name="login"><br><br>

        <label for="mail">Mail</label>
        <input type="mail" name="email"><br><br>

        <label for="password">Password</label>
        <input type="password" name="password"><br><br>

        <label for="confirmation">confirmation</label>
        <input type="password" name="confirmation"><br><br>

        <input type="submit" name="Btn-inscription" value="S'inscrire !">



    </form>

</body>

</html>