<div class="container d-flex flex-wrap gap-3 mt-3">
    <?php foreach ($recettes as $recette) { ?>
        <div class="card" style="width: 18rem;">
            <img src="imgs/<?= $recette['image'] ?>" class="card-img-top" alt="image">
            <div class="card-body">
                <h5 class="card-title"><?= $recette['titre'] ?></h5>
                <p class="card-text">Publier par: <?= $recette['nom_auteur'] ?></p>
                <p class="card-text">Publier par: <?= $recette['description'] ?></p>
                <p class="card-text">Type de recette: <?= $recette['nom_categorie'] ?></p>
                <p class="card-text">
                    Note: <?= ceil($recette['note']) ?> 
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Noté
                    </button>
                </p>
                <span>
                    <?= $recette['nbr_like'] ?> Likes 
                    <a href="?url=like&id_recette=<?= $recette['id_recette'] ?>&id_user=<?= $recette['id_user'] ?>"><i class="fa-solid fa-heart"></i></a>
                </span> <br>
            </div>
        </div>
    <?php } ?>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form action="?url=note" method="post">
                <div class="form-group">
                    <input type="text" name="id_recette" value="<?= $recette['id_recette'] ?>" hidden>
                    <input class="form-control" type="number" name="note" max="10" min="1">
                </div>
                <button class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
  </div>
</div>

</body>
</html>