<?php
session_start();

require_once('libraries/database.php');
require_once('libraries/utils.php');
require_once('component.php');


$pdo = getPdo();

if(isset($_POST['remove'])) {
    // if($_GET['action'] == 'remove') {
        foreach($_SESSION['panier'] as $key => $value) {
            if($value['panier_id'] == $_GET['id']) {
                unset($_SESSION['panier'][$key]);
                // session_destroy();
                echo "<script>alert('Le produit a été supprimé !')</script>";
                echo "<script>window.location = 'panier.php'</script>";

            }
        }
    // }
}


?>


<!doctype html>
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
    <link rel="stylesheet" href="css/header_footer.css">


  </head>
<body>

<!-- NAVBAR du panier  -->
<?php require ('header.php') ?>
  <!-- BOUTON RETOUR  -->
  <div class="sous-le-header">
    <div class="d-flex align-items-start flex-column bd-highlight mb-5"
        style="height: auto">
        <button class="btn mb-auto p-1 align-items-center m-2"
                style="font-size:1.1rem ; background-color:white ; color:#e6232b ; border:solid 3px #1d2f39"
                id="bouton_retour">
            <i class="fas fa-backward"></i>
            <!-- <a style="text-decoration:none ; color:#e6232b" 
                href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour
            </a> -->
        </button>
    </div>
</div>

<!-- ESPACE BLANC -->
<div class="container_espace" style="height:3vh;"></div>  


<h6 class="text-center pb-3"><a href="categories.php">Catégories <i class="fas fa-angle-down"></i></a></h6>


<!-- ESPACE BLANC -->
<div class="ticket" style="max-width: 1100px; padding: 16vh 3vh 8vh 3vh;border: 9px solid #1d2f39; opacity: 0.8; margin:auto; border-radius: 4px">

    <h1 class="text-center" style="font-size:5rem;">MON PANIER</h1>

    <!-- ESPACE BLANC --> <div class="container_espace" style="height:3vh;"></div>  
                        
    <div class="container">
        <div class="row px-2">
            <div class="col-md-12">
                <div class="monpanier" style="padding: 3% 0;">

    <!-- ESPACE BLANC --> <div class="container_espace rounded" style="height:2vh; background-color:#e6232b; margin-bottom: 2vh;"></div>  

                    <?php
                        $total = 0;

                        if(isset($_SESSION['panier'])) {
                            $panierItem_id = array_column($_SESSION['panier'], 'panier_id');
                            $produits = getData(); //FONCTION DEFINIE DANS UTILS

                            foreach($produits as $produit) {
                                foreach($panierItem_id as $id) {
                                    if($produit['prod_id'] == $id) {
                                        itemElement($produit['libelle'], $produit['prix_produit'], $produit['photoP'], $produit['prod_id']);
                                        
                                        $total = $total + (int)$produit['prix_produit'];
                                    }                       
                                }
                            }

                        }else{
                            echo "<h5>Le panier est vide !</h5>";
                        }

                    ?>

                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-md-6  border rounded mt-5">
                    <div class="pt-4">
                        <h5>Détails</h5>
                        <hr>
                        <div class="row price-details">
                            <div class="col-md-9">

                                <?php
                                    if(isset($_SESSION['panier'])) {
                                        $count = count($_SESSION['panier']);
                                        echo "<h5>Prix ($count objets)</h5>";
                                    }else{
                                        echo "<h5>Prix (0 objet)</h5>";
                                    }
                                ?>

                                <h5>Frais de livraison</h5>
                                <hr>
                                <h5>Reste à payer</h5>
                            </div>
                            <div class="col-md-3">
                                <h5>€<?php echo $total; ?></h5>
                                <h5 class="text-success">GRATUIT</h5>
                                <hr>
                                <h5>€<?php echo $total; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="checkout" class="d-flex justify-content-end" style="padding: 8vh 4vh 0 0">
        <button type="submit" class="btn btn-success" style="width:200px; font-size: 2.1vh">Commander</button>
    </div>                                    

</div>

    <div id="payment" class="text-center" style="height: 200px; bottom:0;">
        <img src="libraries/img/payment.png" class="img-fluid h-75 mt-5">
    </div>

<!-- ESPACE BLANC --> <div class="container_espace" style="height:7vh;"></div>

<!-- FOOTER -->
<?php require 'footer.php' ?>


<!-- FIN DE PAGE -->

<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>