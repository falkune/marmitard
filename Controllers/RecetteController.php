<?php
require_once "Controllers/NavController.php";
require_once "Models/CategorieModel.php";
require_once "Models/RecetteModel.php";
require_once "Models/LikeModel.php";
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
            $imgName = $name.".".$type;

            $fileDestination = $_SERVER["DOCUMENT_ROOT"]."/recette/imgs/".$imgName;
            // si l'image est bien sauvegarder
            if(move_uploaded_file($tmp, $fileDestination)){
                if(RecetteModel::addRecette($_POST['titre'], $_POST['description'],$imgName,$_POST['categorie'], $_POST['ingredient'], $_SESSION['user']['id_user'])){
                    echo "ça marche";
                }else{
                    echo "une ereur";
                }
            }
        }
    }

    // methode pour recuperer la liste des recettes
    public function listRecette(){
        return $recettes = RecetteModel::listRecette();
    }

    // methode pour liker une recette
    public function like(){
        LikeModel::like($_GET['id_user'], $_GET['id_recette']);
        header("Location: ?url=home");
    }

    // methode pour noter une recette
    public function note(){
        NoteModel::note($_SESSION['user']['id_user'], $_POST['id_recette'], $_POST['note']);
        header("Location: ?url=home");
    }
}