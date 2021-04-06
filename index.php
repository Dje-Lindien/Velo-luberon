<?php
session_start();

require_once('libraries/database.php');
require_once('libraries/utils.php');


$pdo = getPdo();
// My query to display blogs
$blogs = $pdo->prepare('SELECT * FROM blog ORDER BY RAND() LIMIT 1');
$blogs->execute();

$blog = $blogs->fetch();
?> 


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Rambla&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&display=swap" rel="stylesheet"> 

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

  </head>
<body>


<div class="go_top"><a id="cRetour" class="cInvisible" href="#haut"></a></div>
<div id="haut"></div>

<!-- NAVBAR HEADER -->
<?php require 'header.php' ?>
    
<!-- SLIDER -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="libraries/img/bgg-blanc.jpg" class="d-block w-100" alt="First slide">
            <div id="zoneTxt" class="carousel-caption d-block">
                <img id="logoVLuberon" class="d-block" src="libraries/img/logo.jpg">
                <p class="col-lg-10 d-block pt-5" style="font-size: 2.1vw">De l'effort, de la tendance, du sport, de l'élégance...</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="libraries/img/bg2.jpg" class="d-block w-100" alt="Second slide">
            <div id="zoneTxt2" class="carousel-caption d-block">
                <p class="d-block shadow-lg" style="font-size: 2.1vw">Découvrez les dernières pépites et affrontez le bitume...</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="libraries/img/bg3.jpg" class="d-block w-100" alt="Third slide">
            <div id="zoneTxt3" class="carousel-caption d-block">
                <p class="col-lg-12 d-block shadow p-3" style="font-size: 2.1vw; text-align:left; background-color:rgba(228, 227, 227, 0.336);"><i class="fas fa-biking"></i> Un choix adapté à vos besoins <br> <i class="fas fa-biking"></i> Des promotions toute l'année <br> <i class="fas fa-biking"></i> Un service de qualité</p>
            </div>
        </div>
        </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</div>

<!-- WHITE SPACE --> <div class="container_espace" style="height:13vh;"></div> 


<!-- Product star -->
<div class="container mt-3">
    <div class="row justify-content-around">

        <div class="col-auto my-2">
            <div class="card p-3" style="width: 23rem; height: 29rem">
                <div  style="height: 222px" >
                    <img src="libraries/img/velo2.jpg" class="img-fluid card-img-top m-1" style="max-height: 222px" alt="">
                </div>
                <div class="card-body d-flex flex-column">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="catalogue.php" class="btn btn-primary mt-auto">Découvrir</a>
                </div>
            </div>
        </div>
    
        <div class="col-auto my-2">
            <div class="card p-3" style="width: 23rem; height: 29rem">
                <div  style="height: 222px" >
                    <img src="libraries/img/velo3.jpg" class="img-fluid card-img-top m-1" style="max-height: 222px" alt="">
                </div>
                <div class="card-body d-flex flex-column">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="catalogue.php" class="btn btn-primary mt-auto">Découvrir</a>
                </div>
            </div>
        </div>

        <div class="col-auto my-2">
            <div class="card p-3" style="width: 23rem; height: 29rem">
                <div  style="height: 222px" >
                    <img src="libraries/img/velo4.jpg" class="img-fluid card-img-top m-1" style="max-height: 222px" alt="">
                </div>
                <div class="card-body  d-flex flex-column">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="catalogue.php" class="btn btn-primary mt-auto">Découvrir</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ESPACE BLANC --> <div class="container_espace" style="height:8vh;"></div> 


<!-- CATEGORIES - fixe -->
<?= $cat = categories(); ?>;


<!-- ESPACE BLANC --> <div class="container_espace" style="height:8vh;"></div> 


<!-- BLOG & APPLIS CONSEILLEES -->
<div class="container-fluid d-flex justify-content-evenly col-md-10">

<!-- Blog  -->
    <?php
        $nbimages=4;
        
        $nomimages[1]=$blog['photo'];
        $nomimages[2]=$blog['photo'];
        $nomimages[3]=$blog['photo'];
        $nomimages[4]=$blog['photo'];

        srand((double)microtime()*1000000);

        $affimage=rand(1,$nbimages);

    ?>

    <div class="col-md-5" id="blog_lien">
        <h3>Retrouver les dernières infos</h3>
        <small class="pb-3" style="font-style: italic;">Vélolubeon vous fournit du contenu sportif en avant-première !</small>
        <a href="blog_web.php" value="">
            <div class="text-center" style="max-width:100%; height:350px">
                <img class="rounded shadow img-fluid mt-3" src="libraries/img/<?php echo $nomimages[$affimage];?>" style="max-height: 400px">
            </div>
        </a>
    </div>

    <span style="border: 1px solid rgba(255, 255, 255, 0.1); box-shadow: 7px 3px 3px grey; margin: 0 50px"></span>

<!-- Applis adviced  -->
    <div class="col-md-5" id="appli">
    
        <h3 class="pb-5">Top 5 des applications sportives<br>conseillées par Vélo luberon</h3>
        <div id="appli_bg">
            <ul class="text-center">
                <p><img src="libraries/img/LOGO.png" class="" alt=""></p>
                <p><img src="libraries/img/garmin.png" class="" alt=""></p>
                <p><img src="libraries/img/rmc.png" class="" alt=""></p>
                <p><img src="libraries/img/runtopia.jpg" class="" alt=""></p>
            </ul>
        </div>
    </div>
</div>


<!-- FOOTER -->
<?php require 'footer.php' ?>


<!-- FIN DE PAGE -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>

</body>
</html>
