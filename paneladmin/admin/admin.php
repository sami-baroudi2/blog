<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
if(!isset($_SESSION['id']) AND $_SESSION['id'] != 3) // Seul l'admin peut accéder à cette page. ⛔👮
{
    header('Location: ../index.php');
    die();
}
// Pour supprimer un utilisateur. 🗑️
if(isset($_GET['delete']) AND !empty($_GET['delete']))
{
    $delete = (int) $_GET['delete'];
    $requete = $db->prepare('DELETE FROM `utilisateurs` WHERE id = ?');
    $requete->execute(array($delete));
}
$users = $db->query('SELECT * FROM `utilisateurs` ORDER BY id DESC'); // Je sélectionne les utilisateurs et les membres les plus récents.
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
        <p>Liste des membres :<p><br />
        <ul>
            <?php
            while($select = $users->fetch())
            {
                ?>
                <li><?= $select['id'] ?> : <?= $select['login'] ?> - <a href="admin.php?delete=<?= $select['id'] ?>">Supprimer le membre</a> - <a href="admin-profil.php?edit=<?= $select['id'] ?>">Modifier le membre.</a></li>
                <?php
                }
                ?>
                </ul>
            </body>