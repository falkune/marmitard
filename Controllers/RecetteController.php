<?php
require_once "Controllers/NavController.php";
require_once "Models/CategorieModel.php";
class RecetteController extends NavController{
    // methode pour afficher le formulaire d'ajout de recette
    public function ajoutForm(){
        $this->afficherNav();
        $categories = CategorieModel::getCategories();
        include "Views/ajout_recette.php";
    }

    // methode pour ajouter une recette
    public function add(){
        if(isset($_POST['ajout_recette'])){
            $tmp = $_FILES['image']['tmp_name']; // nom temporaire attribuer par php
            $type = explode('/', $_FILES['image']['type']);
            $type = $type[1]; // recuperer le type du fichier
            $name = date("YmdHis"); // renommer l'image

            $fileDestination = $_SERVER["DOCUMENT_ROOT"]."/recette/imgs/".$name.'.'.$type;
            // si l'image est bien sauvegarder
            if(move_uploaded_file($tmp, $fileDestination)){

            }

        }

    }

}