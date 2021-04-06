<?php
session_start();
require_once('../../libraries/database.php');
require_once('../../libraries/utils.php');

// secureAdmin();
if(!isset($_SESSION['idAdmin'])) {
    header('Location : ../../deconnexion.php');
}

//Requête pour rechercher les produits existants
$pdo = getPdo();
$result = $pdo->query('SELECT * FROM produits ORDER BY prod_id DESC');

$produits = $result->fetchAll();



ob_start();
require("afficher-produits.html.php");
$description = ob_get_clean();

require("layoutprodt.html.php");