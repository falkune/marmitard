<?php
require_once "core/Connect.php";
class LikeModel{
    // methode pour enregistrer un like 
    public static function like($user_id, $recette_id){
        $db = Connect::dbConnect();
        $request = $db->prepare("SELECT * FROM likes WHERE likeur = ? AND recette = ?");
        $request->execute(array($user_id, $recette_id));
        $resultat = $request->fetch();
        if(empty($resultat)){
            $request = $db->prepare("INSERT INTO likes (likeur, recette) VALUES (?,?)");
            $request->execute(array($user_id, $recette_id));
        }
    }
}