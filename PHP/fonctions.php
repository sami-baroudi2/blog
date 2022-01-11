<?php
function getArticles()
{
    require_once('configuration.php');
    $request = $bdd->prepare('SELECT `id`, `article` FROM `articles` ORDER BY id DESC');
    $request->execute();
    $data = $request->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $request->closeCursor();
}