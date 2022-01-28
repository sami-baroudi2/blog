<?php
require 'configuration.php';
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:../index.php');
    session_destroy();
}
var_dump($_POST);
var_dump($_FILES);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST" action="TREATMENT/creer_article_treatment.php" enctype="multipart/form-data">
        <p>Quelle catégories d'articles voulez-vous renseigner?</p>
        <select name="categorie">
            <option value="cat1">Catégorie 1</option>
            <option value="cat2">Catégorie 2</option>
            <option value="cat3">Catégorie 3</option>
        </select>



        <label for="title">Titre de l'article</label>
        <input type="text" name="title" placeholder="Veuillez renseigner le titre de l'article">
        <label for="article">Texte de l'article</label>
        <textarea name="article"></textarea>
        <label for="file">Insérer une image</label>
        <input type="file" name="file">


        <input type="submit" name="submit_article" value="envoyer">
        <?php
        if (isset($_GET['creer'])) {
            $error = $_GET['creer'];

            switch ($error) {
                case 'short':
                    echo "L'article doit contenir plus de 10 caractères";
                    break;

                case 'already':
                    echo "Un article avec le même titre existe déjà";
                    break;

                case 'short':
                    echo "Tout les champs doivent être remplis pour procéder à la création de l'article";
                    break;
            }
        }
        ?>
    </form>
</body>

</html>