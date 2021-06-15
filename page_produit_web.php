<?php


require_once('libraries\database.php');
require_once('libraries\utils.php');

//Connexion
$pdo = getPdo();
//Product selection
$select = $pdo->prepare('SELECT * FROM produits');
$select->execute();
$produit = $select->fetch();

$prod_id = $_GET['id'];


if(!empty($prod_id) && ctype_digit($prod_id)) {

    $selection = $pdo->prepare('SELECT * FROM produits WHERE prod_id = "'.$prod_id.'"');
    $selection->execute();
    $result = $selection->fetchAll();

    $erreur = "";

} else {
    $erreur = "Attention! Vous devez préciser un ID pour afficher ce produit !<a href=\"catalogue.php\">Retour catalogue</a>";

}

//Save the entries of cart
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


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Rambla&display=swap" rel="stylesheet"> -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/page_produit.css">

 </head>

<body>

<div id="background">

    <!-- NAVBAR HEADER -->
    <?php require ('header.php') ?>


    <!-- BOUTON RETOUR  -->
    <div class="sous-le-header">
        <div class="d-flex align-items-start flex-column bd-highlight mb-3"
            style="height: auto">
            <button class="btn mb-auto p-1 align-items-center m-2"
                    style="font-size:1.1rem ; background-color:white ; color:#e6232b ; border:solid 3px #1d2f39"
                    id="bouton_retour">
                <i class="fas fa-backward"></i>
                <a style="text-decoration:none ; color:#e6232b" 
                    href="catalogue.php">Retour
                </a>
            </button>
        </div>
    </div>


<!-- MAIN  -->

    <!-- ESPACE BLANC --> <div class="container_espace" style="height:5vh;"></div> 


    <!-- Bandeau rouge h-50  -->
    <div class="mx-7 pb-5">
        <div class="w-50 py-1 px-5 mb-4" style="background-color: #e6232b;">
            <h3 style="color:antiquewhite;">Produit</h3>
            <span class="border-bottom"></span>
        </div>
    </div>

    <!-- PRODUIT  -->
    <h3 class="text-center" style="color:#e6232b"><?= $erreur ?></h3>

    <div id="display_produit" class="container mt-4">
        <div class="justify-content-center">
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <div id="img-page_produit text-center" class="offset-sm-1 m-auto">

                <?php foreach($result as $colonne) { ?>
                    <img class="img-fluid pt-4 rounded" src="libraries/img/<?php echo $colonne['photoP'] ?>" alt="">
                </div>
                <div id="text-display_produit" class="col-12 col-sm-6">
                    <label><?php echo $colonne['libelle'] ?></label>
                    <h6>La marque</h6>
                    <p class="text-wrap mt-5 h-auto"><?php echo $colonne['descr_produit'] ?>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime sed enim, obcaecati culpa praesentium quia tempore necessitatibus aut, consequatur, nostrum tempora dignissimos beatae reprehenderit fugit fuga quam earum voluptates vel alias omnis exercitationem perspiciatis quod qui? Ducimus, velit? Expedita ut saepe blanditiis voluptatum sed eligendi.</p>
                    <h2 class="display-5 pt-2"><strong><?php echo $colonne['prix_produit'] ?></strong> €</h2>
                <?php  } ?>
                </div>
            </div>  
        </div>


        <div class="col-xs-12 col-md-6 offset-sm-6 mt-5">
            <button type="submit" class="btn btn-primary" name="add">AJOUTER</button>
                <input type="hidden" name="panier_id" value="$prod_id">
            <ul id="caracteristiques" class="w-auto pt-5">
                <li class="c1">Autonomie de 6h</li>
                <li class="c2">Disponible en plusieurs coloris</li>
                <li class="c1">Garantie 2 ans constructeur</li>
                <li class="c2">Made in France</li>
            </ul>
        </div>
    

        <div id="payment" class="text-center" style="height: 200px; bottom:0">
            <img src="libraries/img/payment.png" alt="" class="img-reponsive center-block mt-auto">
        </div>

    </div>
            


    <!-- FOOTER -->
    <?php require 'footer.php' ?>
    
</div>

<!-- FIN DE PAGE -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>