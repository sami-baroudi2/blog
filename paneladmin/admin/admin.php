<?php
session_start();
require '../blog/PHP/configuration.php';
if (!isset($_SESSION['id']) and $_SESSION['id'] != 3) // Seul l'admin peut accéder à cette page. ⛔👮
{
    header('Location: ../index.php');
    die();
}
<<<<<<< HEAD
if (isset($_GET['delete']) and !empty($_GET['delete'])) {
=======
// Pour supprimer un utilisateur. 🗑️
if(isset($_GET['delete']) AND !empty($_GET['delete']))
{
>>>>>>> 2513669fac97dae7215d21de77468c80b43e528f
    $delete = (int) $_GET['delete'];
    $requete = $db->prepare('DELETE FROM `utilisateurs` WHERE id = ?');
    $requete->execute(array($delete));
}
$users = $db->query('SELECT * FROM `utilisateurs` ORDER BY id DESC'); // Je sélectionne les utilisateurs et les membres les plus récents.
$article = $db->query('SELECT * FROM `articles` ORDER BY id DESC');
$com = $db->query('SELECT * FROM `commentaires` ORDER BY id DESC');
?>
<!-- Début de HTML. -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Panel d'administration du blog.">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/blog.css">
    <title>Admin - blog.</title>
</head>

<body>
    <p>Liste des membres/articles/commentaires :
    <p><br />
    <ul>
        <?php
        while ($data = $users->fetch()) {
            echo "<tr><th>$data[id]</th>";
            echo "<th>$data[login]</th>";
            echo "<th>$data[email]</th>";
            echo "<th>$data[droits]</th>";
            echo "<th><a href=\"admin-profil?id=$data[id]\">Supprimer un utilisateur</a></th></tr>";
            echo "<th><a href=\"admin-profil?id=$data[id]\">Modifier un utilisateur</a></th></tr>";
        }
        while ($data = $article->fetch()) {
            echo "<tr><th>$data[id]</th>";
            echo "<th>$data[title]</th>";
            echo "<th>$data[article]</th>";
            echo "<th>$data[id_utilisateur]</th>";
            echo "<th>$data[id_categorie]</th>";
            echo "<th><a href=\"admin-profil?id=$data[id]\">Supprimer un article</a></th></tr>";
            echo "<th><a href=\"admin-profil?id=$data[id]\">Modifier un article</a></th></tr>";
        }
        while ($data = $com->fetch()) {
            echo "<tr><th>$data[id]</th>";
            echo "<th>$data[commentaire]</th>";
            echo "<th>$data[id_article]</th>";
            echo "<th>$data[id_utilisateur]</th>";
            echo "<th><a href=\"admin-profil?id=$data[id]\">Supprimer un commentaire</a></th></tr>";
            echo "<th><a href=\"admin-profil?id=$data[id]\">Modifier un commentaire</a></th></tr>";
        }
        ?>
</body>
