<?php
require_once ROOT . "/connexion/db.php";

function LireToutesLesClasses() : array {
    $sql = "SELECT id, nom, annee_scolaire
            FROM classes";

    $statement = dbRun($sql);

    return $statement->fetchAll();
}

function LireUneClasse(int $id) : array|false {
    $sql = "SELECT id, nom, annee_scolaire
            FROM classes
            WHERE id = :id";

    $param = [
        ":id" => $id
    ];

    $statement = dbRun($sql, $param);

    return $statement->fetch();
}

function AjouterUneClasse(string $nom, string $annee) : void {
    $sql = "INSERT INTO classes (nom, annee_scolaire)
            VALUES (:nom, :annee)";
        
    $params = [
        ":nom" => $nom,
        ":annee" => $annee
    ];

    dbRun($sql, $params);
}

function ModifierUneClasse(int $id, string $nom, string $annee) : void
{
    $sql = "UPDATE classes
            SET nom = :nom,
                annee_scolaire = :annee
            WHERE id = :id";
    
    $params = [
        ":id" => $id,
        ":nom" => $nom,
        ":annee" => $annee,
    ];
    
    dbRun($sql, $params);
}