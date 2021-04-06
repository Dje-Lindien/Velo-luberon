

    <?php foreach ($blogs as $blog) : ?>

        <div id="bg-div" class="col-10 col-md-5 my-3 p-3 m-3 border">
            <div class="row">
                <div class="col-md-6 hidden-sm text-center">
                    <img class="img-fluid card-img-top" src="../../libraries/img/<?= $blog['photo'] ?>" alt="" style="max-height:330px; width:auto">
                </div>
                <div class="col-md-6" style="font-size: 1rem;">
                    <h3 class=""><?= $blog['titre']?></h3>
                    <p class=""><?= $blog['texte']?></p>
                </div>
            </div>
            <div id="bg-button" class="bg-dark rounded d-flex justify-content-around mt-3 p-1">                
                <a class="" href="modif-blog.html.php?id=<?= $blog['blog_id'] ?>">Modifier l'article</a>
                <a class="" href="delete-blog.php?id=<?= $blog['blog_id'] ?>"
                    onclick="return window.confirm('Etes vous sur de vouloir supprimer cet article ??')">Supprimer</a>
            </div>            
        </div>
        
        <?php endforeach ?> 

       