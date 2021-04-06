<?php

require('../../libraries/database.php');
require('../../libraries/utils.php');

secureAdmin();


$blog_id = null;

if(!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $blog_id = $_GET['id'];
}

if(!$blog_id) {
    die("Vous devez préciser une paramètre 'id' dans l'URL !");
}


$pdo = getPdo();
//Check if the article exists...
$query = $pdo->prepare('SELECT * FROM blog WHERE blog_id = ?');
$query->execute([$blog_id]);
if($query->rowCount() === 0) {
    die("Cet article de blog n'existe pas bro !");
}
//Now it is deleted
$delete = $pdo->prepare('DELETE FROM blog WHERE blog_id = ?');
$delete->execute([$blog_id]);


header('Location: ../../lesblogs.php');
exit();