<meta charset="utf-8" />
<!-- Page par Jul -->
<?php // PHP
session_start(); // Ouverture de session.
require_once('configuration.php'); // Connexion DB avec PDO.
$grabID=$_GET['id']; // Il va récupérer l'article sélectionné.
$edit = $db->prepare('SELECT * FROM `articles` WHERE id = ?'); // Je sélectionne les articles.
$edit->execute(array($grabID));
$fetch = $edit->fetch();
if(!isset($_SESSION['id']) AND $_SESSION['id'] != 3) // Seul l'admin peut accéder à cette page. ⛔👮
{
    header('Location: ../index.php'); // Redirection vers l'index si ce n'est pas l'admin ou si aucune session est active.
    die();
}

    if(isset($_POST['Modifier']))
    {
        
        if(!empty($_POST['title']) AND !empty($_POST['article']) AND !empty ($_POST['id_categorie']))
        {

            $title = htmlspecialchars($_POST['title']);
            $article = htmlspecialchars($_POST['article']); // 'htmlspecialchars' une petite sécurité pour éviter d'écrire du HTML sur les champs.
            $id_categorie = ($_POST['id_categorie']);
            $insertData = $db->prepare('UPDATE `articles` SET `title`= ? ,`article`= ? ,`id_categorie`= ? WHERE id=?'); // La commande utilisée qui va modifier l'article dans la BDD.
            $insertData->execute(array($title,$article,$id_categorie,$grabID)); // Il va exécuter la commande.
            echo '<div class="erreur-create-article">L\'article a bien été modifié !'; // Message que la modification à bien été prise en compte.
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page de modification d'articles du blog (Admin).">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/blog.css">
    <title>Modifier un article (Admin) - Blog</title>
    </head>
    <body>
    <div class="container-fluid gray">
      <header>
        <?php
        include ("header-admin.php");
        ?>
        </header>      
      </div>
      <main class="footer-auto-bottom">
        <div class="background">
          <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
        </div>
        <div class="titre-index-zone">
          <p1 class="connexion-titre">Modifiez l'article</p1><br />
        </div>
        <div class="zone-create-article">
            <div class="formulaire-article">
    <form method="POST" action=<?php "admin-article-edit.php?id=$grabID=$_GET[id]" ?>>
        <input type="text" name="title" value="<?= $fetch['title']?>"></input><br />
        <input type="text" name="article" value="<?= $fetch['article']?>"></input><br />
        <select name="id_categorie" class="deroulant-choix-catego" required>
            <option value="null">--Choisissez la catégorie--</option>
            <option value="1">Catégorie 1</option>
            <option value="2">Catégorie 2</option>
            <option value="3">Catégorie 3</option>
        </select><br />
        <input class="edit" type="submit" value="Modifier" name="Modifier"></input>
    </form>
    <br />
            </div>
        </div> 
</body>
</html>