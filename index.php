<?php
// inclure fichier fonctions.php
require_once "includes/fonctions.php";
$recettes = getValidatedRecette();
// inclure le fichier navbar.php
require_once "includes/navbar.php"; 
?>



<div class="container d-flex">
    <?php foreach($recettes as $rec) { ?>
        <div class="card" style="width: 18rem;">
        <img src="imgs/<?= $rec['photos'] ?>" class="card-img-top" alt="<?= $rec['photos'] ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $rec['nom'] ?></h5>
            <span><i class="fa-regular fa-thumbs-up"></i></span>
            <span><i class="fa-solid fa-star"></i></span>
            <a href="views/details_recette.php?id=<?= $rec['id'] ?>" class="btn btn-primary">Voir plus</a>
        </div>
        </div>
    <?php } ?>
</div>