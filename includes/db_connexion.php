<?php
// fonction prmettant de se connecter a la base de donnees
define("SERVER_NAME", "mysql:host=localhost;port=3306");
define("DB_NAME", "marmitard");
define("DB_USER_NAME", "root");
define("DB_USER_PASSWORD", "root");

function dbConnexion(){
    try{
        // return new PDO("mysql:host=localhost;dbname=marmitard", "root", "");
        return new PDO(SERVER_NAME.";dbname=".DB_NAME,DB_USER_NAME,DB_USER_PASSWORD);
    }catch(Exception $e){
        echo $e->getMessage();
    }
}