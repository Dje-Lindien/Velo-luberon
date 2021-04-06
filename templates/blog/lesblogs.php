<?php
session_start();
require_once('../../libraries/database.php');
require_once('../../libraries/utils.php');

if(!isset($_SESSION['idAdmin'])) {
    header('Location : ../../deconnexion.php');
}

// Connection to db
$pdo = getPdo();
// Get the blog article 
$resultats = $pdo->query('SELECT * FROM blog ORDER BY blog_id DESC');
$blogs = $resultats->fetchAll();






//ON AFFICHE
ob_start(); //ob_start(): c'est un tampon qui permet de conserver les données qui sont à afficher
require("affichage-blog.html.php");
$pageContent = ob_get_clean();  // ob_get_clean(): va permettre d'afficher les données qui sont mémorisées dans ob_start()

require("layoutblog.html.php");

?>