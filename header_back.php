<?php


if(isset($_SESSION["idAdmin"])) {
    
    $err = "<a class=\"btn btn-outline-danger\" href=\"/deconnexion.php\">Déconnexion</a>";

}elseif(isset($_SESSION["idUser"])) {

    $err = "<a class=\"btn btn-outline-danger\" href=\"/deconnexion.php\">Déconnexion</a>";

}else{

    $err = "";

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contenu de l'admin</title>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&display=swap" rel="stylesheet"> 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/custom.css">
    <link rel="stylesheet" href="../../css/header_footer.css">

  </head>

    <nav class="navbar navbar-expand justify-content-between py-1">
        <a class="navbar-brand" href="/index.php">
            <img class="logo" src="../../libraries/img/logo_mondovelo.jpg" width="116" height="54" alt="" loading="lazy">
        </a>
            
        <div id="decon">
            <?php echo $err ?>
        </div>                 
    </nav>