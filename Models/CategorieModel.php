<?php
require_once "core/Connect.php";
class CategorieModel{
    // private static $categories = [];
    // retourne toutes les categories
    public static function getCategories(){
        $bd = Connect::dbConnect();
        // preparer la requette
        $request = $bd->prepare("SELECT id_categorie, nom FROM categories");
        // executer la requette
        $request->execute();
        // recuperer le resultat dans un tableau
        // self::$categories = $request->fetchAll();
        $categories = $request->fetchAll();
        return $categories;
    }
    
}