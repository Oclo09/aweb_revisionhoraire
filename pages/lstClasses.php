<?php
/*
à voir si vous voulez une seule page ou pluiseurs
donc, on aura besoin
- formulaire pour la création d'une classe
- liste les classes
*/
define("ROOT", "..");

require_once ROOT . "/functions/classes.php";

$lstClasses = LireToutesLesClasses();

function AfficherListeClasses($lstClasses) : string {
    $resultat = "";

    foreach ($lstClasses as $classes) {
        $resultat .= "<tr>
                        <td>{$classes['nom']}</td>
                        <td>{$classes['annee_scolaire']}</td>
                      </tr>";
    }

    return $resultat;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de Classes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Liste des Classes</h1>
    <form action="ajouter.php" method="post">
        <button type="submit">Ajouter</button>
    </form>
    <hr>
    <table>
        <tr>
            <th>Nom</th>
            <th>Année Scolaire</th>
        </tr>
        <?= AfficherListeClasses($lstClasses) ?>
    </table>
</body>
</html>