
<?php foreach ($produits as $produit) : ?>

    <div class="col-10 col-md-5 my-2">
        <div class="row">
            <div class="col-12 col-md-6 text-center">
                <div class="m-2" style="height:330px">
                    <img class="img-fluid card-img-top h-100 w-auto" src="../../libraries/img/<?= $produit['photoP'] ?>" style="height: auto; width: auto">
                </div>
            </div>
            <div class="col-12 col-md-6 " style="font-size: 1rem;">
                <h3><?= $produit['libelle'] ?></h3>
                <p><?= $produit['descr_produit'] ?></p>
                <h4><?= $produit['prix_produit'] ?></h4>
            </div>
        </div>    
        <div id="bg-button" class="bg-dark rounded d-flex justify-content-around mt-3 p-1">
            <a href="/templates/produits/modif-produit.php?id=<?= $produit['prod_id'] ?>">Modifier le produit</a>
            <a href="/templates/produits/delete-produit.php?id=<?= $produit['prod_id'] ?>"
                onclick="return window.confirm('Etes vous sur de vouloir supprimer ce produit ??')">Supprimer</a>    
        </div>
    </div>

<?php endforeach ?>

