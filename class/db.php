<?php

/**
 * Classe statique permettant de récupérer une connexion à la base de données PDO dans un singleton
 * 
 */
class Db {
    private static $host = "db.3wa.io";
    private static $user = "adrienboeglin";
    private static $password = "59a6226e81d4068118e5f88f966dc992";
    private static $database = "adrienboeglin_blog";
    private static $link = null;
    
    public static function getDb() {
        // Si le lien avec la BDD n'existe pas encore, on le recrée
        if (!self::$link) {
            $dsn = "mysql:dbname=".self::$database.";host=".self::$host;
            // Met le lien de la BDD dans l'attribut statique de la classe
            self::$link = new PDO($dsn, self::$user, self::$password);
        }
        return self::$link;
    }
}