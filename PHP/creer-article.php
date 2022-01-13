<?php
// Page par Jul
require_once('configuration.php');
if(isset($_POST['article_content'], $_POST['categorie_article']))
{
    if(!empty($_POST['article_content']) AND !empty($_POST['categorie_article']))
    {
        $article_content = htmlspecialchars($_POST['article_content']);
        $insertData = $db->prepare('INSERT INTO `articles`(`article`, `id_categorie`, `date`, `id`, `id_utilisateur`) VALUES (?, ?, NOW()), ?, ?');
        $insertData->execute(array($article_content, $categorie_article));
        $notif = 'Article posté!';
    }
    else
    {
        $erreur = 'Champs manquants!';
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/blog.css">
    <title>Créez un article</title>
</head>
<body>
    <form method="POST">
        <textarea name="article_content" placeholder="Contenu de l'article"></textarea><br />
        <select name="categorie_article" class="deroulant-choix-catego">
            <option value="">--Choisissez la catégorie--</option>
            <option value="1">Catégorie 1</option>
            <option value="2">Catégorie 2</option>
            <option value="3">Catégorie 3</option>
        </select><br />
        <input type="submit" value="Postez!" />
    </form>
    <br />
    <?php
    if(isset($notif))
    {
        echo $notif;
    }
    else
    {
        echo $erreur;
    }
    ?>
</body>
</html>
