<?php
// Page par Jul.
session_start(); // On ouvre une session.
session_destroy(); // On ferme la session.
header('location: index.php'); // On redirige la personne à l'acceuil si l'utilisateur s'est déconnecté.
exit;
?>