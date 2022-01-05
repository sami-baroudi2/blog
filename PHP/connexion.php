<!DOCTYPE html>
<<<<<<< HEAD
<html lang="fr">
<!-- Page par Jul -->
=======
<html lang="en">
>>>>>>> a6790694837c85ac42b7dbd7fdd329a39e95b0ff
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/blog.css">
    <title>Connexion</title>
</head>
<body>
    <main>
        <h1 class="connexion-titre">Connexion</h1><br />
        <div class="zone">
            <div class="formulaire-de-co">
                <?php
                if (isset($_GET['login_erreur']))
                {
                    $erreur = htmlspecialchars($_GET['login_erreur']);
                    switch ($erreur)
                    {
                        case 'psuedo':
                        ?>
                        <div class="erreur">
                            <strong>ERREUR</strong>Le nom d'utilisateur ou le mot de passe est incorrect.
                        </div>
                        <?php
                        break;
                        case 'password':
                        ?>
                        <div class="erreur">
                            <strong>ERREUR</strong>Le nom d'utilisateur ou le mot de passe est incorrect.
                        </div>
                        <?php
                        break;
                    }
                }
                ?>
                <form action="TREATMENT/connexion_treatment.php" method="POST">
                    <input type="text" name="login" placeholder="Login"></input>
                    <input type="password" name="password" placeholder="Mot de passe"></input>
                    <input class="bn30" type="submit" value="Connexion" name="Connexion"></input>
            </div>
                </form>
            </div>
        </div>
    </main>
=======
    <title>Document</title>
</head>
<body>
    <form action="connexion_treatment.php" method="post">
        <label for="login">Login or Email</label>
        <input type="text" name="login" required><br><br>
        <label for="password">Password</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="BtnCo">

        <p><a class="forgot" href="forgot_password.php">Forgot your password ?</a></p>
    </form>
>>>>>>> a6790694837c85ac42b7dbd7fdd329a39e95b0ff
</body>
</html>