<?php
require_once "Models/CategorieModel.php";
require_once "Controllers/NavController.php";
class HomeController extends NavController{
    public function afficherPageAccueil(){
        $this->afficherNav();
        include 'Views/home.php';
    }
}