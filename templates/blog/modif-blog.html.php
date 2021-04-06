<?php
require_once('modif-blog.php');
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/custom.css">
    <link rel="stylesheet" href="../../css/header_footer.css">

    <title>Liste des articles de blog</title>

  </head>


<body>
<div class="bg_connexion">

<!-- NAVBAR HEADER -->
<?php include ('../../header_back.php') ?>

<!-- BOUTON RETOUR  -->
<div class="sous-le-header">
    <div class="d-flex align-items-start flex-column bd-highlight mb-5"
        style="height: auto">
        <button class="btn mb-auto p-1 align-items-center m-2"
                style="font-size:1.1rem ; background-color:white ; color:#e6232b ; border:solid 3px #1d2f39"
                id="bouton_retour">
            <i class="fas fa-backward"></i>
            <a style="text-decoration:none ; color:#e6232b" 
                href="/pageadmin.html.php?id=<?= $_SESSION['idAdmin']?>">Retour
            </a>
        </button>
    </div>
</div>

<!-- Bandeau rouge h-50  -->
<div class="mx-7 pb-4">
    <div class="w-50 py-1 px-5" style="background-color: #e6232b;">
        <h3 style="color:antiquewhite;">Modification de l'article n° <?= $blog_id ?></h3>
        <span class="border-bottom"></span>
    </div>
</div>

<!-- Formulaire de modification blog  -->
<div id="form-new-blog" class="container">
    <div class="row m-5">

        <h4 class="text-center p-5" style="color: red">

            <?php
                if(isset($erreur)) {
                    echo $erreur;
                }else{
                    $erreur = "";
                    echo $erreur;
                } 
            ?>
        </h4>

        <div class="col-sm-8">
            <form action="" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <input type="text" name="modifTitre" class="form-control" placeholder="Titre à modifier">
                    <textarea name="modifTexte" rows="4" cols="20" class="form-control mt-1" placeholder="Article à modifier"></textarea>
                </div>
                <div class="pt-3 row justify-content-around">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
                    <h5 class="py-1">Nouveau fichier :</h5>
                    <div class="col-10">
                        <input type="file" name="modifPhoto" class="btn btn-light" style="background-color:lightgray">
                    </div>
                    <div class="col-10 col-md-2">
                        <button type="submit" class="btn btn-danger mx-2" name="modifBlog" style="font-size: 1.2rem;">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ESPACE BLANC --> <div class="container_espace" style="height:6vh;"></div> 



<?php if(isset($_POST['modifBlog'])) { ?>
<div class="text-center col-6 offset-3">
    <h4>Article de blog modifié : </h4>
    <h1><?= $titre ?></h1>
    <p><?= $texte ?></p>
    <img class="img-fluid card-img-top" src="<?= $target_dir . $photo ?>" alt="" style="height:400px ; width:auto">
</div>
<?php } ?>

</div>
<!-- FOOTER -->
<?php require '../../footer.php' ?>


<!-- FIN DE PAGE -->
  <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/custom.js"></script>

</body>
</html>
