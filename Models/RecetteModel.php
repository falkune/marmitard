<?php
require_once "core/Connect.php";
class RecetteModel{
    public static function addRecette($titre, $description,$image,$categorie,$listeIngredient,$auteur){
        $db = Connect::dbConnect();
        $request = $db->prepare("INSERT INTO recettes (titre, description, image, categorie, liste_ingredients, auteur) VALUES (?, ?, ?, ?, ?, ?)");
        try{
            $request->execute(array($titre, $description,$image,$categorie,$listeIngredient,$auteur));
            return true;
        }catch(PDOException $e){
            // echo $e->getMessage();
            return false;
        }
    }

    // pour recuperer les recettes
    public static function listRecette(){
        $db = Connect::dbConnect();
        $request = $db->prepare(
            "SELECT recettes.titre as titre, recettes.id_recette as id_recette, recettes.description as description, recettes.image as image, categories.nom as nom_categorie, users.nom as nom_auteur, users.id_user as id_user, COUNT(likes.id_like) as nbr_like
            FROM recettes
            JOIN categories ON recettes.categorie = categories.id_categorie
            JOIN users ON recettes.auteur = users.id_user
            LEFT JOIN likes ON recettes.id_recette = likes.recette
            GROUP BY recettes.id_recette");
        $request->execute();
        $recettes = $request->fetchAll();
        return $recettes;
    }

}