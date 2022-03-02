<?php
// Page par Sami.
session_start();
require 'configuration.php';
if (!isset($_SESSION['id'])) {
    header('Location: connexion.php');
    die(); // Inaccesibilité en cas de session absente ou fausse. Redirection vers index. ❌
}
$req = $db->prepare('SELECT * FROM articles');
$req->execute(array());
$check = $req->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/blog.css">
    <title>Ajouter un commentaire - Blog</title>
</head>
<?php
if (isset($_GET['id'])) {
    $article = $_GET['id'];
    $art = $db->prepare('SELECT * FROM articles WHERE id = ?');
    $art->execute(array($article));
    $fetch = $art->fetch();
}
?>

<body>
    <main>
        <?php include('header-admin.php'); ?>
        <div class="background">
            <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
        </div>


        <p1 class="connexion-titre">Commentaire</p1><br />
        <div class="zone">
            <div class="formulaire-de-co">
                <div>
                    <h1 class="zone">Article</h1>
                    <h1 class="connexion-titre"><?= $fetch['title']; ?></h1>
                    <p><?= $fetch['article']; ?></p>
                </div>
            </div>
            <div class="formulaire-de-co">
                <form action="TREATMENT/commentaire_treatment.php" method="POST">
                    <?php
                    if (isset($_GET['commentaire'])) {
                        $commentaire = $_GET['commentaire'];

                        switch ($commentaire) {
                            case 'short':
                                echo '<p style="color : white;">ERREUR : Votre commentaire doit faire au minimum 5 caractères</p>';
                                break;

                            case 'empty':
                                echo '<p style="color : white;">ERREUR : Tout les champs doivent être remplis</p>';
                                break;
                        }
                    }
                    ?>
                    <label for="id">ID</label><br><br>
                    <input type="text" name="id" value="<?= $article ?>" readonly>
                    <label for="commentaire">Commentaire</label><br><br>
                    <input type="text" name="commentaire">
                    <input type="submit" name="btn-com" class="edit" value="Envoyer">
                </form>


    </main>
    <?php include('footer2.php'); ?>
</body>

</html>