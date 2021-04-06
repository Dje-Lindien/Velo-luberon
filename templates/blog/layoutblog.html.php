
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <title>Mes articles de blog</title>

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



<div class="mx-7">
    <div class="w-50 py-1 px-5 my-4" style="background-color: #e6232b;">
        <h2 clas="text-left" style="color:antiquewhite;">Tous mes articles de blog</h2>
        <span class="border-bottom"></span>
    </div>
</div>


<div class="bg-color">
    <div class="container-fluid pt-5">
        <div class="d-flex flex-wrap  justify-content-evenly">

    <!-- <?= $pageTitle ?> -->

    <?= $pageContent ?>

        </div>
    </div>
</div>

<?php require('../../footer.php') ?>



<!-- FIN DE PAGE -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>