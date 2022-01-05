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
if (isset($_GET["login_erreur"])) {

$error = $_GET["login_erreur"];

switch ($error) {
    case 'empty':
?>
        <div class="erreur">
            Tous champs doivent être remplis pour procéder à l'inscription.
        </div>
    <?php
        break;
    case 'login':
    ?>
        <div class="erreur">
            Le login ou le mot de passe est incorrect.
        </div>
    <?php
        break;
}
}

?>
    <form action="TREATMENT/connexion_treatment.php" method="post">
        <label for="login">Login</label>
        <input type="text" name="login" required><br><br>
        <label for="password">Password</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="BtnCo" value="connexion">

        <p><a class="forgot" href="forgot_password.php">Forgot your password ?</a></p>
    </form>
</body>
</html>