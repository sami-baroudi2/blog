<!-- Page par Jul -->
<?php
session_start();
?>
        <!-- Header dynamique -->
        <nav class="nav bg-dark justify-content-center">
            <?php if(isset($_SESSION['id'])) : ?> <!-- Lorsque la personne est connectée, il verra ces 2 sections dans le header. -->
                <a href='PHP/deconnexion.php' class='nav-link text-light'>Déconnexion</a>
                <a href='PHP/profil.php' class='nav-link text-light'>Modifier le profil</a>
                <?php if($_SESSION['droits'] == 1337) : ?> <!-- Seul l'admin verra cette section dans le header. 👮 -->
                    <a href='PHP/admin.php' class='nav-link text-light'>Panel admin</a>
                <?php endif; ?>
            <?php else : ?> <!-- Lorsque la personne est déconnectée, il verra ces 2 sections dans le header. -->
                <a href='PHP/connexion.php' class='nav-link text-light'>Connexion</a>
                <a href='PHP/inscription.php' class='nav-link text-light'>Inscription</a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Catégorie d'articles</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="PHP/cat1.php">Catégorie 1</a></li>
                        <li><a class="dropdown-item" href="PHP/cat2.php">Catégorie 2</a></li>
                        <li><a class="dropdown-item" href="PHP/cat3.php">Catégorie 3</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </nav>