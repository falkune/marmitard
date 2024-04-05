<div class="container">
    <?php foreach ($recettes as $recette) { ?>
        <div class="card" style="width: 18rem;">
            <img src="imgs/<?= $recette['image'] ?>" class="card-img-top" alt="image">
            <div class="card-body">
                <h5 class="card-title"><?= $recette['titre'] ?></h5>
                <p class="card-text">Publier par: <?= $recette['nom_auteur'] ?></p>
                <p class="card-text">Type de recette: <?= $recette['nom_categorie'] ?></p>
                <span>
                    <?= $recette['nbr_like'] ?> Likes 
                    <a href="?url=like&id_recette=<?= $recette['id_recette'] ?>&id_user=<?= $recette['id_user'] ?>">liker</a>
                </span> <br>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    <?php } ?>
</div>

</body>
</html>