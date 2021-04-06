<?php


function component($libelle, $prix, $photoP, $prod_id) {
    
    $element =
    "<div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
    <a href=\"page_produit_web.php?id=$prod_id\" style=\"text-decoration: none; color: black\">
        <form action=\"catalogue.php\" style=\"width: 20rem\" method=\"POST\">
            <div class=\"card shadow mx-4 my-5\" style=\"height:491px\">
                <div><img src=\"libraries/img/$photoP\" style=\"max-height: 200px\" class=\"img-fluid card-img-top my-3 w-auto\">
                </div> 
                <div class=\"card-body d-flex flex-column justify-content-end\">
                    <h5 class=\"card-title\">$libelle</h5>
                    <h6>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"far fa-star\"></i>
                    </h6>
                    <p class=\"card-text\">
                        Exemples d'annonces pour ce produit
                    </p>
                    <h5><span class=\"price\">$prix €</span>
                    </h5>

                    <button type=\"submit\" class=\"btn btn-primary my-3\" name=\"add\">Ajouter au panier
                        <i class=\"fas fa-shopping-cart\"></i>
                    </button>
                    <input type=\"hidden\" name=\"panier_id\" value=\"$prod_id\">
                </div>
            </div>
        </form>       
    </a></div>";

    echo $element;
}


function itemElement($libelle, $prix, $photoP, $prod_id) {

    $element=
    "<form action=\"panier.php?action=remove&id=$prod_id\" method=\"POST\" class=\"cart-item\">
        <div class=\"border-bottom rounded mt-3\">
            <div class=\"row bg-white py-3\">
                <div class=\"col-md-3\">
                    <img src=\"libraries/img/$photoP\" alt=\"\" class=\"img-fluid\">
                </div>
                <div class=\"col-md-6\">
                    <h5 class=\"pt-2\">$libelle</h5>
                    <small class=\"text-secondary\">Vendeur : Véloluberon</small>
                    <h5 class=\"pt-3\">€ $prix</h5>
                    
                    <button type=\"submit\" class=\"btn btn-warning mt-3\">Mettre de côté</button>
                    <button type=\"submit\" class=\"btn btn-danger mx-2 mt-3\" name=\"remove\">Supprimer</button>
                </div>
                <div class=\"col-md-3 py-5\">
                    <div>
                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>";

    echo $element;
}


?>