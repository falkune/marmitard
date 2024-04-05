<?php
require_once "core/Connect.php";
class NoteModel{
    // methode pour enregistrer un like 
    public static function note($user_id, $recette_id, $note){
        $db = Connect::dbConnect();
        $request = $db->prepare("SELECT * FROM notes WHERE user = ? AND recette = ?");
        $request->execute(array($user_id, $recette_id));
        $resultat = $request->fetch();
        if(empty($resultat)){
            $request = $db->prepare("INSERT INTO notes (user, recette, note) VALUES (?,?,?)");
            $request->execute(array($user_id, $recette_id, $note));
        }
    }
}