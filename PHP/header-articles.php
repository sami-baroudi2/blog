<!-- Page par Jul -->
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
            if(isset($_SESSION['id'])) // Lorsque la personne est connectée, il verra ces 2 sections dans le header.
            {
                echo "<a href='deconnexion.php' class='nav-link text-light'>Déconnexion</a>
                <a href='profil.php' class='nav-link text-light'>Modifier le profil</a>
                <a href='../index.php' class='nav-link text-light'>Retour à l'accueil</a>";
                if($_SESSION['droits'] == 1337) // Seul l'admin verra cette section dans le header. 👮
                {
                    echo "<a href='PHP/admin.php' class='nav-link text-light'>Panel admin</a>";
                }
            }
            else // Lorsque la personne est déconnectée, il verra ces 2 sections dans le header.
            {
                echo "<a href='connexion.php' class='nav-link text-light'>Connexion</a>
                <a href='inscription.php' class='nav-link text-light'>Inscription</a>
                <a href='../index.php' class='nav-link text-light'>Retour à l'acceuil</a>";
            }    
            ?>
        </nav>
    </body>
</html>