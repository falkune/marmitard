<!-- inclure la navbar -->
<?php require_once "../includes/navbar.php"; ?>

<div class="w-50 mx-auto">
    <form action="../controller/login_controller.php" method="post">
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

        <button class="btn btn-success">Login</button>
    </form>
</div>