<!DOCTYPE html>
<html lang="fr">
<!-- Page par Sami -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/blog.css">
    <title>Connexion</title>
</head>
<body>
<div class=" container-fluid gray">
      <header>
        <?php
        include ("header-co.php");
        ?>
        </header>      
      </div>
    <main>
        <div class="background">
            <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
        </div>
        <p1 class="connexion-titre">Connexion</p1><br />
        <div class="zone">
            <div class="formulaire-de-co">
                <?php
                if (isset($_GET["login_erreur"]))
                {
                    $error = $_GET["login_erreur"];
                    switch ($error)
                    {
                        case 'empty':
                ?>
                </div>
        </div>
                            <p1 class="erreur">
                                Tous champs doivent être remplis pour procéder à l'inscription.
                            </p1>
                        <?php
                            break;
                        case 'login':
                        ?>
                            <p1 class="erreur">
                                Le login ou le mot de passe est incorrect.
                            </p1>
                <?php
                            break;
                    }
                }
                ?>
                <form action="TREATMENT/connexion_treatment.php" method="post">
                    <label for="login">Login</label>
                    <input type="text" name="login" required><br><br>
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" required><br><br>
                    <input class="boutton" type="submit" name="BtnCo" value="Connexion">
                    <p class="forgot"><a href="forgot_password.php">Mot de passe oublié ?</a></p>
            </form>
    </main>
    <footer>
            <?php
            include('footer2.php');
            ?>
            </footer>
</body>
</html>