<meta charset="utf-8" />
<!-- Page par Jul -->
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../index.php');
    die(); // Inaccesibilité en cas de session absente ou fausse. Redirection vers index.
}
require_once('configuration.php');
$_SESSION["id"];
if (isset($_POST['Modifier'])) {
    if (!empty($_POST['login']) and !empty($_POST['password'])) // Avec else, il va afficher un message si des champs ont étés oubliés.
    {
        $login = $_POST['login'];
        $password = $_POST['password']; // Je ne mettrais pas de chiffrement du mot de passe pour faciliter la correction (même si nous pouvons déchiffrer facilement) pour éviter de perdre du temps de à chaque fois c/c le mdp et le décrypter
        $insertData = $db->prepare('UPDATE utilisateurs SET login = ? ,password=? WHERE id = ?'); // La commande utilisée qui va modifier l'user dans la BDD.
        $insertData->execute(array($login, $password, $_SESSION['id'])); // Il va exécuter la commande.
        echo "Les informations ont bien étés modifiées " . $login . " !"; // Message que la modification à bien été prise en compte.
    } else {
        echo "Tu dois remplir tous les champs !"; // Le message des champs oubliés.
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
    <title>Modifier son profil - Blog</title>
</head>
<main>
    <p1>Modifier le profil</p1><br />
    <div class="zone">
        <div class="formulaire-update-profile">
            <ul class="session-affiche">
                <?php
                echo "<b>Login actuel : " . $_SESSION['login'] . "</b>";
                ?>
            </ul>
            <form method="POST" action="profil.php">
                <input type="text" name="login" placeholder="Un nouveau psuedo...">Login :<br /></input>
                <input type="password" name="password">Mot de passe :<br /></input>
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