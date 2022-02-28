<?php
session_start();
// Page par Jul
require_once('configuration.php');
if (!isset($_SESSION['id'])) {
  header('Location: connexion.php');
  die(); // Inaccesibilité en cas de session absente ou fausse. Redirection vers index. ❌
}
if (isset($_POST['submit'])) {
  if (!empty($_POST['title']) && !empty($_POST['article']) && !empty($_POST['id_categorie'])) {
    $title = htmlspecialchars($_POST['title']);
    $article = htmlspecialchars($_POST['article']);
    $id_categorie = htmlspecialchars($_POST['id_categorie']);
    $id_session = $_SESSION['id'];
    echo $title . ";" . $article . ';' . $id_categorie . ';' . $_SESSION['id'];
    $insertData = $db->prepare('INSERT INTO `articles`(`title`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES (?, ?, ?, ?, NOW())');
    $insertData->execute(array($title, $article, $id_session, $id_categorie));
    echo '<div class="erreur-create-article">Article posté!</div>'; // Message si l'article à été posté avec succès.
  } else {
    echo '<div class="erreur-create-article">Champs manquants!</div>'; // Message si l'article n'est pas posté, pour champs manquants.
  }
}
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Page de création d'articles du blog.">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/blog.css">
  <title>Créez un article</title>
</head>

<body>
  <div class="container-fluid gray">
    <header>
      <?php
      include("header-articles.php");
      ?>
    </header>
  </div>
  <main class="footer-auto-bottom">
    <div class="background">
      <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
    </div>
    <div class="titre-index-zone">
      <p1 class="connexion-titre">Créez un article</p1><br />
    </div>
    <div class="zone-create-article">
      <div class="formulaire-article">
        <form method="POST">
          <input type="text" name="title" placeholder="Choisissez un titre"></input><br />
          <input type="text" name="article" placeholder="Contenu de l'article"></input><br />
          <select name="id_categorie" class="deroulant-choix-catego">
            <option value="null">--Choisissez la catégorie--</option>
            <option value="1">Catégorie 1</option>
            <option value="2">Catégorie 2</option>
            <option value="3">Catégorie 3</option>
          </select><br />
          <input class="boutton" name="submit" type="submit" value="Postez!" />
        </form>
        <br />
      </div>
    </div>
    <footer>
      <?php
      include 'footer2.php';
      ?>
    </footer>
</body>

</html>