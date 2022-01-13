<?php
// Page par Jul
require_once('configuration.php');
if(isset($_POST['article_title'], $_POST['article_content']))
{
    if(!empty($_POST['article_title']) AND !empty($_POST['article_content']))
    {
        $article_title = htmlspecialchars($_POST['article_title']);
        $article_content = htmlspecialchars($_POST['article_content']);
        $insertData = $bdd->prepare('INSERT INTO `articles`(`id`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES (?, ?, ?, ?, NOW())');
        $insertData->execute(array($article_title, $article_content));
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
        <input type="text" name="article_title" placeholder="Titre" />
        <textarea name="article_content" placeholder="Contenu de l'article"></textarea>
        <input type="submit" value="Postez!" />
    </form>
    <br />
    <?php
    if(isset($notif))
    {
        echo $notif;
    }
    ?>
</body>
</html>
