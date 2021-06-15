<?php

require_once('database.php');


function render(string $path, array $variables = [])
{
    extract($variables);

    ob_start();
    require('templates/' . $path . '.html.php');
    $pageContent = ob_get_clean();

    require('./templates/layoutblog.html.php');
    require('./layoutprodt.html.php');

}

// Get products
function getData(){

    $pdo = getPdo();
    $query = $pdo->prepare('SELECT * FROM produits');
    $query->execute();
    $num = $query->rowCount();

    $produits = $query->fetchAll();

    if($num > 0) {
        return $produits;
    }
}

//Secure the user visit
function secureUser() {

    if(!isset($_SESSION['idUser'])) {
        header('Location : ../../deconnexion.php');
    }
}

//Secure the admin visit
function secureAdmin() {

    if(!isset($_SESSION['idAdmin'])) {
        header('Location : ../../deconnexion.php');
    }
}

//Category in function :
function categories() {

    $cat = 
    "<div id=\"jumbo\" class=\"jumbotron py-2\">
        <div class=\"container\">
                <h1 class=\"display-4\">Catégories</h1>
                <p class=\"lead py-2\">Retrouver nos articles dans les catégories suivantes</p> <hr>      
            <div class=\"row\">
                <div class=\"container_thumbnails-menu d-flex justify-content-center flex-wrap\">
                    <a href=\"#\" class=\"thumbnail col-md-3\">
                        <img src=\"libraries/img/roues.jpg\" class=\"img-thumbnail rounded mx-auto d-block\" alt=\"#\">
                    </a>    
                    <a href=\"#\" class=\"thumbnail col-md-3\">
                        <img src=\"libraries/img/pompe.jpg\" class=\"img-thumbnail rounded mx-auto d-block\" alt=\"...\">
                    </a>
                    <a href=\"#\" class=\"thumbnail col-md-3\">
                        <img src=\"libraries/img/met.jpg\" class=\"img-thumbnail rounded mx-auto d-block\" alt=\"...\">
                    </a>
                    <a href=\"#\" class=\"thumbnail col-md-3\">
                        <img src=\"libraries/img/garmin.jpg\" class=\"img-thumbnail rounded mx-auto d-block\" alt=\"...\">
                    </a>
                    <a href=\"#\" class=\"thumbnail col-md-3\">
                        <img src=\"libraries/img/buff.jpg\" class=\"img-thumbnail rounded mx-auto d-block\" alt=\"...\">
                    </a>
                    <a href=\"#\" class=\"thumbnail col-md-3\">
                        <img src=\"libraries/img/elec.jpg\" class=\"img-thumbnail rounded mx-auto d-block\" alt=\"...\">
                    </a>
                    <a href=\"#\" class=\"thumbnail col-md-3\">
                        <img src=\"libraries/img/batterie_elec.jpg\" class=\"img-thumbnail rounded mx-auto d-block\" alt=\"...\">
                    </a>
                    <a href=\"#\" class=\"thumbnail col-md-3\">
                        <img src=\"libraries/img/roues.jpg\" class=\"img-thumbnail rounded mx-auto d-block\" alt=\"...\">
                    </a>
                </div>
            </div>
            <hr>
        </div>
    </div>";

    echo $cat;

}
?>