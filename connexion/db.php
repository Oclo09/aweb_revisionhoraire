<?php
require_once ROOT . "/config/database.php";

function dbo() : PDO
{   
    static $db = null;

    if($db === null)
    {
        // Se connecter à la base de données
        $db = new PDO
        (
            "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHAR,
            DB_USER,
            DB_PASS
        );
    }

    // Configurer la connexion à la DB
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    return $db;
} 

/**
 * Prépare et exécute une requête SQL.
 *
 * @param string $sql La requête SQL
 * @param array $param Les paramètres de la requête (optionnel)
 *
 * @return PDOStatement La requête préparée et exécutée.
*/

function dbRun($sql, $param = null) : PDOStatement
{
    $statement = dbo()->prepare($sql);
    
    $statement->execute($param);
    
    return $statement;
}