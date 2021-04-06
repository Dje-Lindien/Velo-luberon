
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

<body>

    
<!-- NAVBAR HEADER -->
<?php require("../../header_back.php"); ?>

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
<div class="mx-7 pb-5">
    <div class="w-50 py-1 px-5 mb-4" style="background-color: #e6232b;">
        <h2 style="color:antiquewhite;">Ajouter un produit</h2>
        <span class="border-bottom"></span>
    </div>
</div>


<!-- Form to add product  -->
<div id="form-new-produit" class="container">
    <div class="row m-5">

        <h4 class="text-center p-5" style="color: red">
            <?= $erreur ?>
        </h4>

        <form action=""  enctype="multipart/form-data" method="POST">
            <div>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="newLibelle" placeholder="Libellé du produit">
                    <input type="text" class="form-control w-100 mt-1" name="newDescript" placeholder="Description" style="height:350px;">
                    <input type="text" class="form-control" name="newPrix" placeholder="€">
                </div>
                <div class="col-sm-8 row justify-content-between p-3">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                    <h5 class="py-1">Envoyez ce fichier :</h5>
                    <div class="col-3">
                        <input type="file" class="btn btn-light" name="newPhoto" style="background-color:lightgray"/>
                    </div> 
                    <div class="col-1">
                        <button type="submit" id="btn-valider" class="btn btn-danger mx-2" name="newProduit" style="font-size: 1.2rem;">Valider</button>  
                    </div>           
                </div>
            </div>
        </form>

    </div>
</div>


<!-- FOOTER -->
<?php require("../../footer.php"); ?>


<!-- END PAGE -->

  <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>