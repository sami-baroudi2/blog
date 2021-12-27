<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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