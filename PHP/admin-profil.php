<meta charset="utf-8" />
<!-- Page par Jul -->
<?php
session_start();
require_once('configuration.php');
$edit = $db->query('SELECT * FROM `utilisateurs` WHERE id'); // Je sélectionne les utilisateurs et les membres les plus récents.
if(!isset($_SESSION['id']) AND $_SESSION['id'] != 3) // Seul l'admin peut accéder à cette page. ⛔👮
{
    header('Location: ../index.php');
    die();
}
$grabID=$_GET['id'];
    if(isset($_POST['Modifier']))
    {
        if(!empty($_POST['login']) AND !empty($_POST['password']) AND !empty ($_POST['email']) AND !empty ($_POST['droits'])) // Avec else, il va afficher un message si des champs ont étés oubliés.
        {
            $login = htmlspecialchars($_POST['login']);
            $email = htmlspecialchars($_POST['email']); // 'htmlspecialchars' une petite sécurité pour éviter d'écrire du HTML sur les champs.
            $droits = ($_POST['droits']);
            $password = sha1($_POST['password']);
            $insertData = $db->prepare('UPDATE `utilisateurs` SET `login`= ? ,`email`= ? ,`droits`= ? ,`password`= ? WHERE id=?'); // La commande utilisée qui va modifier l'user dans la BDD.
            $insertData->execute(array($login,$email,$droits,$password,$grabID)); // Il va exécuter la commande.
            echo "Les informations ont bien étés modifiées " . $login . " !"; // Message que la modification à bien été prise en compte.
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
        <link rel="stylesheet" href="CSS/blog.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Modifier son profil (Admin) - Blog</title>
    </head>
    <main>
        <p1>Modifier le profil</p1><br />
        <div class="zone">
            <div class="formulaire-update-profile">
                <ul class="session-affiche">
                    </ul>
                    <form method="POST" action=<?php "admin-profil.php?id=$grabID=$_GET[id]" ?>>
                        <input type="text" name="login" placeholder="Un nouveau psuedo...">Login :<br /></input>
                        <input type="text" name="email" placeholder="Une nouvelle adresse e-m@il...">e-mail :<br /></input>
                        <input type="password" name="password">Mot de passe :<br /></input>
                        <select name="droits" class="deroulant-choix-catego">
                            <option value="">--Droit à attribuer--</option>
                            <option value="1">Utilisateur</option>
                            <option value="42">Modérateur</option>
                            <option value="1337">Administrateur</option>
                        </select><br />
                        <input class="edit" type="submit" value="Modifier" name="Modifier"></input>
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <a href="https://github.com/sami-baroudi2/blog"><img class="GitHub" src="images/GitHub_Logo.png" alt="logo"></img></a>
        </footer>
    </body>
</html>