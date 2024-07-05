<?php
// inclure fichier fonctions.php
require_once "includes/fonctions.php";
$recettes = getValidatedRecette();
// inclure le fichier navbar.php
require_once "includes/navbar.php"; 
?>



<div class="d-flex">
    <?php foreach($recettes as $rec) { ?>
        <div class="card" style="width: 18rem;">
        <img src="imgs/<?= $rec['photos'] ?>" class="card-img-top" alt="<?= $rec['photos'] ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $rec['nom'] ?></h5>
            
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>
    <?php } ?>
</div>