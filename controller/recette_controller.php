<?php
// signifier a cette page que ici je vais manipuler des variables de sessions(creer, lire, modifier, supprimer)
session_start();
// inclure le fichier permettant d'assurer la connexion avec la base de donnees
require_once("../includes/db_connexion.php");

// verifier si l'utilisateur a valider le formulaire
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // recuperation des donnees
    $nomRecette     = $_POST["nom_recette"];
    $listIngredient = $_POST["ingredients"];
    $description    = $_POST["description"];
    $categorie      = $_POST["categorie"];

    // definition de la distination de l'image
    $targetfile = "../imgs/".$_FILES['photo_recette']['name'];

    try{
        move_uploaded_file($_FILES['photo_recette']['tmp_name'], $targetfile);
        // enregistrer les informations dans la base de donnees
        $dbConnexion = dbConnexion();
        // preparer la requete
        $request = $dbConnexion->prepare("INSERT INTO recettes (nom, liste_ingredients, description, photos, id_user, id_categorie) VALUES (?, ?, ?, ?, ?, ?)");
        // execution de la requete
        $request->execute([
            $nomRecette,
            $listIngredient,
            $description,
            $_FILES['photo_recette']['name'],
            $_SESSION['id_user'],
            $categorie
        ]);
        // rediriger vers la page d'accueil
        header("Location: http://localhost/marmitard/");

    }catch(Exception $e){
        echo $e->getMessage();
    }
}