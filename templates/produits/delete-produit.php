<?php

require_once('../../libraries/database.php');
require_once('../../libraries/utils.php');

//Secure
secureAdmin();
//Null when arrive on page
$prod_id = null;

if(isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $prod_id = $_GET['id'];
}

if(!$prod_id) {
    die("Vous devez préciser une paramètre dans l'URL !");
}


$pdo = getPdo();
// Recuperation du produit
$query = $pdo->prepare('SELECT * FROM produits WHERE prod_id = ?');
$query->execute([$prod_id]);

if($query->rowCount() === 0) {
    die("Cet article de blog n'existe pas bro !");
}

// Suppression du produit
$delete = $pdo->prepare('DELETE FROM produits WHERE prod_id = ?');
$delete->execute([$prod_id]);


header('Location: ../lesproduits.php');
exit();

?>