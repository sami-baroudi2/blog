<?php
session_start();
require 'configuration.php';
if (!isset($_SESSION['id']) and $_SESSION['id'] != 3) // Seul l'admin peut accéder à cette page. ⛔👮
{
  header('Location: ../index.php');
  die();
}
// Pour supprimer un utilisateur.
if (isset($_GET['delete-user']) and !empty($_GET['delete-user'])) {
  $delete = (int) $_GET['delete-user'];
  $requete = $db->prepare('DELETE FROM `utilisateurs` WHERE id = ?');
  $requete->execute(array($delete));
}
// Pour supprimer un article.
if (isset($_GET['delete-article']) and !empty($_GET['delete-article'])) {
  $delete = (int) $_GET['delete-article'];
  $requete = $db->prepare('DELETE FROM `articles` WHERE id = ?');
  $requete->execute(array($delete));
}
if (isset($_GET['delete-com']) and !empty($_GET['delete-com'])) {
  $delete = (int) $_GET['delete-com'];
  $requete = $db->prepare('DELETE FROM `commentaires` WHERE id = ?');
  $requete->execute(array($delete));
}
$users = $db->query('SELECT * FROM `utilisateurs` ORDER BY id DESC'); // Je sélectionne les utilisateurs et je classe au + récent.
$article = $db->query('SELECT * FROM `articles` ORDER BY id DESC'); // Je sélectionne les articles et je classe au + récent.
$com = $db->query('SELECT * FROM `commentaires` ORDER BY id DESC'); // Je sélectionne les commentaires et je classe au + récent.
?>
<!-- Début du HTML. -->
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> <!-- Bootstrap -->
  <link rel="stylesheet" href="../CSS/blog.css">
  <title>Panel admin - Blog</title>
</head>

<body>
  <div class="container-fluid gray">
    <header>
      <?php
      include("header-admin.php");
      ?>
    </header>
  </div>
  <main class="footer-auto-bottom">
    <div class="titre-index-zone">
      <p1 class="titre-index">Liste des articles, commentaires, utilisateurs</p1><br />
    </div>
    <article>
      <div class="table-wrapper">
        <table class="fl-table">
          <thead>
            <tr>
              <th>Utilisateurs</th>
              <th>e-mails</th>
              <th>Droits</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($data = $users->fetch()) {
              echo "<tr>
                  <td>" . $data['login'] . "<a href=\"admin.php?delete-user=$data[id]\">Supprimer</a> <a href=\"admin-profil.php?id=$data[id]\">Modifier</a></td>";
              echo "<td>" . $data['email'] . "</td>";
              echo "<td>" . $data['droits'] . "</td>
                  </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="table-wrapper">
        <table class="fl-table">
          <thead>
            <tr>
              <th>Titres</th>
              <th>Articles</th>
              <th>Catégorie</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($data = $article->fetch()) {
              echo "<tr>
                  <td>" . $data['title'] . "<a href=\"admin.php?delete-article=$data[id]\">Supprimer</a> <a href=\"admin-article-edit.php?id=$data[id]\">Modifier</a></td>";
              echo "<td>" . $data['article'] . "</td>";
              echo "<td>" . $data['id_categorie'] . "</td>
                  </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="table-wrapper">
        <table class="fl-table">
          <thead>
            <tr>
              <th>Commentaire</th>
              <th>Id_article</th>
              <th>Id_utilisateur</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($data = $com->fetch()) {
              echo "<tr>
                  <td>" . $data['commentaire'] . "<a href=\"admin-edit-commentaire.php?delete-com=$data[id]\">Supprimer</a> <a href=\"admin-edit-commentaire.php?id=$data[id]\">Modifier</a></td>";
              echo "<td>" . $data['id_article'] . "</td>";
              echo "<td>" . $data['id_utilisateur'] . "</td>
                  </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>

    </article>
  </main>
  <footer>
    <div class="container-fluid gray">
      <?php
      include("footer2.php");
      ?>
    </div>
  </footer>
</body>

</html>