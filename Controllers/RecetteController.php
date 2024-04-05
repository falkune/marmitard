<?php
require_once "Controllers/NavController.php";
require_once "Models/CategorieModel.php";
class RecetteController extends NavController{
    public function ajoutForm(){
        $this->afficherNav();
        $categories = CategorieModel::getCategories();
        include "Views/ajout_recette.php";
    }
}