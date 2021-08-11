<?php


/**
 * Return connexion to db
 * 
 * @return PDO
 */

function getPdo(): PDO
{
    $pdo = new PDO('mysql:host=localhost;dbname=*****', '*****', '*****', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    return $pdo;
}


?>
