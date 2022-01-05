<!-- Page par Jul -->
<?php
session_start();
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>
<body>
    <!-- Header dynamique -->
    <nav class="nav bg-dark justify-content-center">
        <?php
        if (isset($_SESSION['id']))
        {
            echo "<a href='PHP/deconnexion.php' class='nav-link text-light'>Déonnexion</a>
            <a href='PHP/profil.php' class='nav-link text-light'>Modifier le profil</a>";
        }
        else
        {
            echo "<a href='PHP/connexion.php' class='nav-link text-light'>Connexion</a>
            <a href='PHP/inscription.php' class='nav-link text-light'>Inscription</a>";
        }
        ?>
    </nav>
</body>
</html>