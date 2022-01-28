<?php
session_start();
require '../configuration.php';

if (!empty($_POST['title']) && !empty($_POST['article']) && !empty($_POST['categorie'])) {

    $title = trim(htmlspecialchars($_POST['title']));
    $article = trim(htmlspecialchars($_POST['article']));
    $categorie = trim(htmlspecialchars($_POST['categorie']));

    $req = "SELECT * FROM articles WHERE title = ?";
    $query = $db->prepare($req);
    $query->execute(array($title));
    $id = $_SESSION['id'];
    $data = $query->fetch();
    $row =$query->rowCount();
    if ($row > 0) {
        if (strlen($article) >= 10) {
            $date = new datetime();
            $date->format('Y-m-d H:i:s');

            $make = 'INSERT INTO  articles (title, article, id_utilisateur, id_categorie, date) VALUES (?,?,?,?,NOW())';
            $insert = $db->prepare($make);
            $insert->execute(array($title, $article, $id, ));
        } else {
            header('Location:../creer-article.php?creer=short');
        }
    } else {
        header('Location:../creer-article.php?creer=already');

    }
} else {
    header('Location:../creer-article.php?creer=empty');
}
