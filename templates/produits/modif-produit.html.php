<?php
require_once('modif-produit.php');
?>


<!DOCTYPE html>>
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

    <title>Catalogue produits</title>

  </head>


<body>


<!-- NAVBAR HEADER -->
<?php require ('../../header_back.php') ?>

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


<!-- <button><a href="/templates/lesproduits.php">Retour au catalogue</a></button> -->

<!-- Bandeau rouge h-50  -->
<div class="mx-7 pb-4">
    <div class="w-50 py-1 px-5" style="background-color: #e6232b;">
        <h3 style="color:antiquewhite;">Modification du produit n° <?= $prod_id ?></h3>
        <span class="border-bottom"></span>
    </div>
</div>


<!-- Formulaire de modification produit  -->
<div id="form-new-blog" class="container">
    <div class="row m-5">

        <div class="col-sm-8">
            <form action="" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <input type="text" name="modifLibelle" class="form-control" placeholder="Libellé à modifier">
                    <textarea name="modifDescr" class="form-control mt-1" placeholder="Description" rows="4" cols="20"></textarea>
                    <input type="number" name="modifPrix" placeholder="€">
                </div>
                <div class="pt-3 row justify-content-around">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                    <h5 class="py-1">Envoyez ce fichier :</h5>
                    <div class="col-10">
                        <input type="file" name="modifPhotoP" class="btn btn-light" style="background-color:lightgray"/>
                    </div>               
                    <div class="col-10 col-md-2">   
                        <button type="submit" class="btn btn-danger mx-2" name="modifProd" style="font-size: 1.2rem;">Valider</button>                
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ESPACE BLANC --> <div class="container_espace" style="height:6vh;"></div> 


<?php if(isset($_POST['modifProd'])) { ?>
<div class="text-center">
    <h4>Produit modifié : </h4>
    <h1><?= $libelle ?></h1>
    <p><?= $descript ?></p>
    <div><?= $prix ?></div>
    <img src="/libraries/img/<?= $photoP ?>">
</div>

<?php } ?>

<!-- FOOTER -->
<?php require '../../footer.php' ?>


<!-- FIN DE PAGE -->
  <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/custom.js"></script>

</body>
</html>