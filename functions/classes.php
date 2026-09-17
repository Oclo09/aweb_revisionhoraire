<?php
require_once ROOT . "/connexion/db.php";

function LireToutesLesClasses() : array {
    $sql = "SELECT id, nom, annee_scolaire
            FROM classes";

    $statement = dbRun($sql);

    return $statement->fetchAll();
}

function AjouterUneClasse(string $nom, string $annee) {
    $sql = "INSERT INTO classes (nom, annee_scolaire)
            VALUES (:nom, :annee)";
        
    $params = [
        ":nom" => $nom,
        ":annee" => $annee
    ];

    dbRun($sql, $params);
}