<?php
require_once ROOT . "/connexion/db.php";

function LireToutesLesClasses() : array {
    $sql = "SELECT id, nom, annee_scolaire
            FROM classes";

    $statement = dbRun($sql);

    return $statement->fetchAll();
}