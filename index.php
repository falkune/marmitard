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
            <h5 class="card-title"><?= $rec['nom_recette'] ?></h5>
            <!-- affichage du like -->
            <p>
                <a href="../controller/detail_recette_controller.php?id=<?= $rec['id_recette'] ?>">
                    <span><i class="fa-regular fa-thumbs-up"></i></span>
                </a>
            </p>
            <!-- affichage de la note -->
            <p><span><i class="fa-solid fa-star"></i> <?= round($rec['moyenne'], 2) ?> </span></p>
            <a href="views/details_recette.php?id=<?= $rec['id_recette'] ?>" class="btn btn-primary">Voir plus</a>
        </div>
        </div>
    <?php } ?>
</div>