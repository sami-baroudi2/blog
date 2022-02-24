<meta charset="utf-8" />
<!-- Page par Jul -->
<?php
session_start();
if(!isset($_SESSION['id']))
{
    header('Location: ../index.php');
    die(); // Inaccesibilité en cas de session absente ou fausse. Redirection vers index.
}
require_once('configuration.php');
$_SESSION["id"];
if(isset($_POST['Modifier']))
{
    if(!empty($_POST['login']) AND !empty($_POST['password']) AND !empty ($_POST['email'])) // Avec else, il va afficher un message si des champs ont étés oubliés.
    {
        $login = htmlspecialchars($_POST['login']);
        $email = htmlspecialchars($_POST['email']); // 'htmlspecialchars' une petite sécurité pour éviter d'écrire du HTML sur les champs.
        $password = sha1($_POST['password']);
        $insertData = $db->prepare('UPDATE `utilisateurs` SET `login`= ? ,`email`= ? ,`password`= ? WHERE id = ?'); // La commande utilisée qui va modifier l'user dans la BDD.
        $insertData->execute(array($login,$email,$password,$_SESSION['id'])); // Il va exécuter la commande.
        echo '<div class="erreur-create-article">Les informations ont bien étés modifiées " . $login . " !'; // Message que la modification à bien été prise en compte.
    }
    else
    {
        echo '<div class="erreur-create-article">Tu dois remplir tous les champs !'; // Le message des champs oubliés.
    }
}
?>
<!-- Début du HTML. -->
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> <!-- Bootstrap -->
        <link rel="stylesheet" href="../CSS/blog.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Modifier son profil - Blog</title>
    </head>
    <body>
        <div class="container-fluid gray">
            <header>
                <?php
                include ("header-admin.php");
                ?>
            </header>      
        </div>
        <main>
            <div class="background">
                <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
            </div>
            <div class="titre-index-zone">
                <p1 class="connexion-titre">Modifier le profil</p1><br />
            </div>
            <div class="zone-create-article">
                <div class="formulaire-article">
                    <ul class="session-affiche">
                        <?php
                        echo "<b>Login actuel : " . $_SESSION['login'] . "</b>";
                        ?>
                    </ul>
                    <form method="POST" action="profil.php" align="center">
                        <input type="text" name="login" placeholder="Un nouveau psuedo...">Login :<br /></input>
                        <input type="text" name="email" placeholder="Une nouvelle adresse e-m@il...">e-mail :<br /></input>
                        <input type="password" name="password">Mot de passe :<br /></input>
                        <input class="edit" type="submit" value="Modifier" name="Modifier"></input>
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <?php
            include('footer.php');
            ?>
        </footer>
    </body>
</html>