<?php
// signifier a cette page que ici je vais manipuler des variables de sessions(creer, lire, modifier, supprimer)
session_start();
// inclure le fichier permettant d'assurer la connexion avec la base de donnees
require_once("../includes/db_connexion.php");

if(isset($_SERVER['REQUEST_METHOD']) == "POST"){
    $note = $_POST['note'];
    $idRecette = $_POST['id'];

    // etablir la connexion avec la base de donnees
    $dbConnexion = dbConnexion();
    // preparer une premiere requete qui verifie si cet utilisateur a deja notté cette recette
    $request = $dbConnexion->prepare("SELECT id FROM notes WHERE id_user = ? AND id_recette = ?");
    // executer la requete
    $request->execute([$_SESSION['id_user'], $idRecette]);
    // recuperer le resultat dans un tableau
    $resultat = $request->fetch();
}