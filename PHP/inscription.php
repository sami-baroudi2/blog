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
    <title>inscription</title>
</head>
<body>
    <div class=" container-fluid gray">
        <header>
            <?php
            include ("header-register.php");
            ?>
            </header>      
        </div>
        <main class="footer-auto-bottom">
            <div class="background">
                <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
            </div>
            <div class="titre-index-zone">
                <p1 class="connexion-titre">inscription</p1><br />
            </div>
            <div class="zone">
                <div class="formulaire-update-profile-admin">
                    <?php
                    if (isset($_GET["inscription_err"]))
                    {
                        $error = $_GET["inscription_err"];
                        switch ($error)
                        {
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
                        <input input class="form-admin-edit-profile" type="text" name="login"><br><br>
                        <label for="mail">Adresse e-m@il</label>
                        <input input class="form-admin-edit-profile" type="text" name="email"><br><br>
                        <label for="password">Mot de passe</label>
                        <input input class="form-admin-edit-profile" type="password" name="password"><br><br>
                        <label for="confirmation">Confirmation du mdp</label>
                        <input input class="form-admin-edit-profile" type="password" name="confirmation"><br><br>
                        <input class="boutton" type="submit" name="Btn-inscription" value="S'inscrire !">
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <?php
            include('footer2.php');
            ?>
        </footer>
    </body>
</html>