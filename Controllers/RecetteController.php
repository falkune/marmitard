<?php
require_once "Controllers/NavController.php";
class RecetteController extends NavController{
    public function ajoutForm(){
        $this->afficherNav();
        include "Views/ajout_recette.php";
    }
}