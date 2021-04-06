
<head>
<link rel="stylesheet" href="css/header_footer.css">

</head>

    <nav class="navbar navbar-expand justify-content-between py-1">
        <a class="navbar-brand" href="index.php">
            <img class="logo" src="libraries/img/logo_mondovelo.jpg" width="116" height="54" alt="" loading="lazy">
        </a>

        <ul class="navbar-nav d-flex align-items-center">

            <li class="nav-item d-none d-xl-block">
                <div id="d1">
                    <form class="form-inline" action="/page_produit_web.php" method="get">
                        <fieldset>    
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <select id="oCategorie" name="oCategorie" class="form-control">
                                        <option selected="selected" value="0">Catégorie</option>
                                        <option value="catalogue.php">Nos produits</option>
                                        <option value="1">...</option>
                                        <option value="2">...</option>
                                    </select>
                                </div>
                                <input id="oSaisie" name="oSaisie" type="search" class="form-control" name="q" aria-label="Saisie de mots clés" required="required">
                                <div class="input-group-append">
                                    <button class="btn btn-danger" type="submit">Recherche</button>
                                </div>
                            </div>
                        </fieldset> 
                    </form>
                </div>
            </li>

            <li class="nav-item d-none d-sm-block">
                <a class="nav-link align-baseline" id="togg1" href="#recherche"><i class="fas fa-search"></i></a>
            </li>

            <li class="nav-item">
                <a href="connexion.php" class="nav-link"><i class="fas fa-users"></i>
                </a>
            </li>

            <li class="nav-item"> 
                <a id="panier-bg-color" href="panier.php" class="nav-link">    
                    <i class="fas fa-shopping-cart"></i>
                    
                    <?php 

                    if(isset($_SESSION['panier'])) {
                        $count = count($_SESSION['panier']);
                        echo "<span class=\"align-middle\" id=\"nombre_panier\">$count</span>";

                    }else{
                        echo "<span class=\"align-middle\" id=\"nombre_panier\">0</span>";
                    }

                    ?>
                    
                </a>     
            </li>

        </ul>
    </nav>
    
<script src="js/custom.js"></script>
