<?php
require_once "db_connexion.php";

// cette fonction permet de recuperer la liste des categories
function getCategoryList(){
    // etablir la connexion avec la base de donnees
    $dbConnexion = dbConnexion();
    // preparer la requete qui permet de recuperer la liste des categories
    $request = $dbConnexion->prepare("SELECT id, nom FROM categories");
    // executer la requete
    $request->execute();
    // recuperer le resultat de le requete dans un tableau 
    $categoryList = $request->fetchAll();
    return $categoryList;
}

// fonction qui permet de recuperer la liste des recette dont le status est true
function getValidatedRecette(){
    // etablir la connexion avec la base de donnees
    $dbConnexion = dbConnexion();
    // preparer la requete qui permet de recuperer la liste des categories
    $request = $dbConnexion->prepare("SELECT * FROM recettes WHERE statut = ?");
    // executer la requete
    $request->execute([1]);
    // recuperer le resultat de le requete dans un tableau 
    $recetteList = $request->fetchAll();
    return $recetteList;
}