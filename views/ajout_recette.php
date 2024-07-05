<?php 
    require_once "../includes/fonctions.php";
    $categoryList = getCategoryList();
    // nclure la navbar
    require_once "../includes/navbar.php";
?>



<div class="w-50 mx-auto">
    <form action="../controller/recette_controller.php" method="post" enctype="multipart/form-data">
        <!-- le nom de la recette -->
        <div class="mb-3">
            <label class="form-label">Nom Recette</label>
            <input type="text" name="nom_recette" class="form-control">
        </div>
        <!-- liste des ingredients de la recette -->
        <div class="mb-3">
            <label class="form-label">Liste Ingredients</label>
            <input type="text" name="ingredients" class="form-control">
        </div>
        <!-- description e la recette -->
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        <!-- Categorie de la recette -->
        <div class="mb-3">
            <label class="form-label">Categorie</label>
            <select class="form-select" name="categorie">
                <option selected value="">Selectionnez une categorie</option>
                <?php foreach($categoryList as $category) { ?>
                    <option value="<?= $category['id'] ?>"><?= $category['nom'] ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- photo de la recette -->
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="photo_recette" accept="image/png,image/jpg,image/jpeg">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>

        <button class="btn btn-success">Publier La Recette</button>
    </form>
</div>