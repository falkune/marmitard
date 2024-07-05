<?php
// signifier a cette page que ici je vais manipuler des variables de sessions(creer, lire, modifier, supprimer)
session_start();
// inclure le fichier permettant d'assurer la connexion avec la base de donnees
require_once("../includes/db_connexion.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $note = $_POST['note'];
    $idRecette = $_POST['id'];

    // verifier si l'utilisateur qui veux mettre une note est authentifier
    if(isset($_SESSION['id_user'])){
        // etablir la connexion avec la base de donnees
        $dbConnexion = dbConnexion();
        // preparer une premiere requete qui verifie si cet utilisateur a deja notté cette recette
        $request = $dbConnexion->prepare("SELECT id FROM notes WHERE id_user = ? AND id_recette = ?");
        // executer la requete
        $request->execute([$_SESSION['id_user'], $idRecette]);
        // recuperer le resultat dans un tableau
        $resultat = $request->fetch();
        if(empty($resultat)){ // si le tableau $resultat est vide
            // preparer la requete pour ajouter la note
            $req = $dbConnexion->prepare("INSERT INTO notes (id_user, id_recette, note) VALUES(?,?,?)");
            // executer la requete
            $req->execute([$_SESSION['id_user'], $idRecette, $note]);
        }
        // rediriger vers details_recette.php en mettant l'id de la recette
        header("Location: http://localhost/marmitard/views/details_recette.php?id=$idRecette");
    }else{
        // rediriger vers login.php
        header("Location: http://localhost/marmitard/views/login.php");
    }
}else if(isset($_GET['id'])){
    // etablir la connexion avec la base de donnees
    $dbConnexion = dbConnexion();
    // preparer une premiere requete qui verifie si cet utilisateur a deja liker cette recette
    $request = $dbConnexion->prepare("SELECT id FROM likes WHERE id_user = ? AND id_recette = ?");
    // executer la requete
    $request->execute([$_SESSION['id_user'], $_GET['id']]);
    // recuperer le resultat dans un tableau
    $resultat = $request->fetch();
    if(empty($resultat)){ // si le tableau $resultat est vide
        // preparer la requete pour ajouter le like
        $req = $dbConnexion->prepare("INSERT INTO likes (id_user, id_recette) VALUES(?,?)");
        // executer la requete
        $req->execute([$_SESSION['id_user'], $_GET['id']]);
    }
    header("Location: http://localhost/marmitard");
}