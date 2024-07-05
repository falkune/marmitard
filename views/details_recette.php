<?php
// inclure fichier fonctions.php
require_once "../includes/fonctions.php";
$recette = getRecetteDetails($_GET['id']);
// inclure le fichier navbar.php
require_once "../includes/navbar.php"; 
?>

<div class="card mb-3">
  <img src="../imgs/<?= $recette['photos'] ?>" class="card-img-top" alt="<?= $recette['photos'] ?>">
  <div class="card-body">
    <h5 class="card-title"><?= $recette['nom'] ?></h5>
    <p class="card-text"><?= $recette['description'] ?></p>
    <p class="card-text">
        <small class="text-body-secondary"><?= $recette['liste_ingredients'] ?></small>
    </p>
    <button>donnez une note</button>
  </div>
</div>