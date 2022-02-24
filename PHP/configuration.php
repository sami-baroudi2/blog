<?php
// Page par Sami
try {

$db = new PDO  ("mysql:host = localhost ;dbname=blog", 'root' , ''); 

$db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
    echo "ERREUR :" . " ". $e->getMessage();
}
