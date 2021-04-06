<?php
session_start();

require_once('libraries\database.php');
require_once('libraries\utils.php');
require_once('component.php');

//We get the data from the cart
if(isset($_POST['add'])) {

    if(isset($_SESSION['panier'])) {
        $item_array_id = array_column($_SESSION['panier'], "panier_id");

        if(in_array($_POST['panier_id'], $item_array_id)) {
            echo "<script>alert('Votre produit est déja dans le panier !')</script>";
            echo "<script>window.location = 'catalogue.php'</script>";

        }else{
            $count = count($_SESSION['panier']);
            $item_array = array('panier_id' => $_POST['panier_id']);

            $_SESSION['panier'][$count] = $item_array;
        }

    }else{

        $item_array = array('panier_id' => $_POST['panier_id']);
        
        //On créé une variable de SESSION pour pouvoir mettre les id des produits dans le panier
        $_SESSION['panier'][0] = $item_array;
        print_r($_SESSION['panier']);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>Catalogue produits</title>

  </head>

<body>

<!-- NAVBAR HEADER -->
<?php require ('header.php') ?>
 

<!-- ESPACE BLANC --> <div class="container_espace" style="height:6vh;"></div> 


<!-- JUMBOTRON  -->
<div id="jumbo_histoire" class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="bg shadow">
            <div class="d-flex">
                <div class="col-6">
                    <img src="libraries/img/bg3.jpg" style="height:400px;width:auto;">
                </div>
                <div class="p-2">
                    <h1 class="display-4">Fluid jumbotron</h1>
                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                </div>   
            </div>
        </div>
    </div>
</div>


<!-- ESPACE BLANC --> <div class="container_espace" style="height:6vh;"></div> 


<!-- Bandeau rouge h-50  -->
<div class="mx-7 pb-4">
    <div class="w-50 py-1 px-5" style="background-color: #e6232b;">
        <h3 style="color:antiquewhite;">Catalogue</h3>
        <span class="border-bottom"></span>
    </div>
</div>


<!-- CATALOGUE  -->
<div class="container">
    <div class="row text-center py-8">
        <!-- DISPLAY PRODUCTS (need a function) -->
            <div class="container">
                <div class="row text-center py-5">

                    <?php
                        //FuNCTION to call
                        $produits = getData();
                        
                        foreach($produits as $produit) {                               
                            component($produit['libelle'], $produit['prix_produit'], $produit['photoP'], $produit['prod_id']);
                        }
                        
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
    

<!-- FOOTER -->
<?php require 'footer.php' ?>


<!-- FIN DE PAGE -->
  <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>

