<!-- inclure la navbar -->
<?php require_once "../includes/navbar.php"; ?>

<!-- formulaire d'inscription -->

<div class="w-50 mx-auto">
    <form action="../controller/register_controller.php" method="post" enctype="multipart/form-data">
        <!-- le nom -->
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control">
        </div>
        <!-- le prenom -->
        <div class="mb-3">
            <label class="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control">
        </div>
        <!-- l'Email -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <!-- Mot de passe -->
        <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="mdp" class="form-control">
        </div>
        <!-- age -->
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" class="form-control" min="18">
        </div>
        <!-- Sexe -->
        <div class="form-check">
            <input class="form-check-input" type="radio" value="Femme" name="sexe" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Femme
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" value="Homme" name="sexe" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Homme
            </label>
        </div>
        <!-- photo profile -->
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="photo" accept="image/png,image/jpg,image/jpeg">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>

        <button class="btn btn-success">Register</button>
    </form>
</div>