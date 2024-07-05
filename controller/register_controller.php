<?php
// inclure le fichier permettant d'assurer la connexion avec la base de donnees
require_once("../includes/db_connexion.php");
// verifier si l'utilisateur a bien valider le formulaire pour arrver sur cette page
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // recuperation des donnees dans des variables
    if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['age']) || empty($_POST['sexe'])){
        // rediriger vers la page register.php
        header("Location: ../views/register.php");
    }else{
        // recuperation des donnees 
        $nom    = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age    = $_POST['age'];
        $email  = $_POST['email'];
        $mdp    = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $sexe   = $_POST['sexe'];
        // recuperation et upload de l'image sur le serveur
        // definition de la distination de l'image
        $targetfile = "../imgs/".$_FILES['photo']['name'];
        // sauvegarder l'image dans le dossier imgs
        try{
            move_uploaded_file($_FILES['photo']['tmp_name'], $targetfile);
            // enregistrer les informations dans la base de donnees
            $dbConnexion = dbConnexion();
            // preparer la requete
            $request = $dbConnexion->prepare(
                "INSERT INTO users (nom, prenom, age, mdp, email, sexe, profile_image) VALUES 
                (?, ?, ?, ?, ?, ?, ?)"
                );
            // execution de la requete
            $request->execute([
                $nom, 
                $prenom, 
                $age, 
                $mdp, 
                $email, 
                $sexe, 
                $_FILES['photo']['name']
            ]);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
else{
    // rediriger vers la page register.php
    header("Location: ../views/register.php");
}