<?php
require_once('libraries/database.php');

//Connexion to data
$pdo = getPdo();
// Requete pour afficher les blogs 
$query = $pdo->prepare('SELECT* FROM blog');
$query->execute();
$blogs = $query->fetchAll();

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Rambla&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

  </head>

<!-- NAVBAR HEADER -->
<?php include ('header.php') ?>

<!-- BOUTON RETOUR  -->
<div class="sous-le-header">
    <div class="d-flex align-items-start flex-column bd-highlight mb-5"
        style="height: auto">
        <button class="btn mb-auto p-1 align-items-center m-2"
                style="font-size:1.1rem ; background-color:white ; color:#e6232b ; border:solid 3px #1d2f39"
                id="bouton_retour">
            <i class="fas fa-backward"></i>
            <a style="text-decoration:none ; color:#e6232b" 
                href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour
            </a>
        </button>
    </div>
</div>


<!-- Bandeau rouge h-50  -->
<div class="mx-7 pb-4">
    <div class="w-50 py-1 px-5" style="background-color: #e6232b;">
        <h3 style="color:antiquewhite;">Dernières actualités VéloLuberon</h3>
        <span class="border-bottom"></span>
    </div>
</div>

<!-- Display blog -->
<div class="bg-color">
    <div class="container-fluid pt-5">
        <div class="d-flex flex-wrap justify-content-center">

        <?php foreach ($blogs as $blog) : ?>

            <div id="bg-div" class="col-9 m-5" style="max-height: 600px; min-height: 250px">
                <div class="row shadow h-100">
                    <div class="col-md-5 col-hidden-sm center-block text-center py-3">
                        <img class="img-fluid" src="../../libraries/img/<?= $blog['photo'] ?>" alt="" style="">
                    </div>
                    <div class="col-md-7 py-3" style="font-size: 1rem;">
                        <h3 class=""><?= $blog['titre']?></h3>
                        <p class=""><?= $blog['texte']?></p>
                    </div>
                </div>
                <a href="page_blog"></a>            
            </div>

            <?php endforeach ?> 

        </div>
    </div>
</div>


<!-- FOOTER -->
<?php require 'footer.php' ?>


<!-- FIN DE PAGE -->
  <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>

</body>
</html>