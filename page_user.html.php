<?php

require_once('libraries/database.php');
require_once('page_user.php');


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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

  </head>
<body>

<!-- NAVBAR HEADER -->
<?php require ('header_back.php') ?>


<!-- ESPACE BLANC --> <div class="container_espace" style="height:15vh;"></div> 


<div class="mx-7">
    <div class="w-50 py-1 px-4 my-4 text-right" style="background-color: #e6232b;">
        
        <h2 style="color:antiquewhite;">Edition de profil</h2>
        <span class="border-bottom"></span>
    </div>
</div>


<!-- ESPACE BLANC --> <div class="container_espace" style="height:10vh;"></div> 


<div id="form-user-modif" class="container-fluid row justify-content-center">
    <div class="col-11 col-sm-7">

        <form method = "POST" action = "">
            <?php foreach ($infos as $info) { ?>
                <div class="form-group row align-items-center pb-2">
                    <h5 class="col-sm-2">Nom :</h5>
                    <div class="col-sm-2">
                        <input type = "text" readonly class ="form-control-plaintext" value ="<?php echo $info['nom']; ?>">
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control w-100" type = "text" class="" name = "modifNom" placeholder="Nom à modifier">
                    </div>
                </div>

                <div class="form-group row align-items-center pb-2">
                    <h5 class="col-sm-2">Prenom :</h5>
                    <div class="col-sm-2">
                        <input type = "text" readonly class ="form-control-plaintext" value ="<?= $info['prenom'] ?>">
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control w-100" type = "text" name = "modifPrenom" placeholder ="Prénom à modifier">
                    </div>
                </div>

                <div class="form-group row align-items-center pb-2">
                    <h5 class="col-sm-2">Email :</h5>
                    <div class="col-sm-2">
                        <input type = "email" readonly class ="form-control-plaintext" value="<?= $info['mail'] ?>">
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control w-100" type = "email" name = "modifMail" placeholder="Adresse mail à modifier">
                    </div>
                </div>

                <hr class="my-5 w-75">

                <div class="form-group row">
                    <h5 class="col-sm-4">Mot de passe</h5>
                    <div class="col-sm-6">
                        <input class="form-control w-100" type = "password" name = "modifMdp" placeholder = "Nouveau mot de passe">
                    </div>
                </div>

                <div class="form-group row my-3">
                    <h5 class="col-sm-4">Confirmer mot de passe</h5>
                    <div class="col-sm-6">
                        <input class="form-control w-100" type = "password" name = "confMdp" placeholder = "Confirmer votre mot de passe" >               
                        <input type="hidden" value="<?= $infos['id'] ?>">
                    </div>
                </div>

                <div class="text-center pt-5" style="color: red">
                    <?= $erreur; } ?>
                </div>
        
                <div class="col-12 justify-content-around my-auto">
                    <input class="col-10 offset-2 btn btn-light border mt-4" type = "submit" action="" value = "Mettre à jour mon profil" name = "modifSubmit">
                </div>
        </form>
    </div>
</div>


<!-- ESPACE BLANC --> <div class="container_espace" style="height:10vh;"></div> 


<!-- FOOTER -->
<?php require ('footer.php') ?>


<!-- FIN DE PAGE -->

  <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>