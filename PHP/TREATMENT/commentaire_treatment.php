<?php
session_start();
require_once '../configuration.php';

if (!isset($_SESSION['id'])) {
    header('Location:../../index.php');
}

$req = $db->prepare('SELECT * FROM utilisateurs WHERE id = ?');
$req->execute(array($_SESSION['id']));
$data = $req->fetch();
    if (!empty($_POST['commentaire'])) {
        $id_article = htmlspecialchars($_POST['id']);
        $commentaire = trim(htmlspecialchars($_POST['commentaire']));
        if (strlen($commentaire) > 5) {
            $insert = $db->prepare('INSERT INTO commentaires(commentaire,id_article ,id_utilisateur,date) VALUES(?, ?, ?, NOW())');
            $insert->execute(array($commentaire, $id_article, $_SESSION['id']));
            header('Location:../articles.php?commentaire=success');
        } else {
            header('Location:../commentaire.php?commentaire=short&id='.$id_article);
        }
    } else {
        header('Location:../commentaire.php?commentaire=empty&id='.$id_article);
    }

