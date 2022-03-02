<!-- Page par Jul -->
<?php
session_start();
?>
<!-- Header dynamique -->
<nav class="nav bg-dark justify-content-center">
    <?php if(isset($_SESSION['id'])) : ?> <!-- Lorsque la personne est connectée, il verra ces 2 sections dans le header. -->
        <a href='deconnexion.php' class='nav-link text-light'>Déconnexion</a>
        <a href='profil.php' class='nav-link text-light'>Modifier le profil</a>
        <a href='../index.php' class='nav-link text-light'>Retour à l'accueil</a>   
    <?php else : ?> <!-- Lorsque la personne est déconnectée, il verra ces 2 sections dans le header. -->       
        <a href='connexion.php' class='nav-link text-light'>Connexion</a>
        <a href='inscription.php' class='nav-link text-light'>Inscription</a>
        <a href='../index.php' class='nav-link text-light'>Retour à l'acceuil</a>
    <?php endif; ?>
</nav>