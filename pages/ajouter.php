<?php
define("ROOT", "..");

require_once ROOT . "/functions/classes.php";

$submit = filter_input(INPUT_POST, "submit", FILTER_UNSAFE_RAW);

if ($submit === "retour") {
    header("Location: lstClasses.php");
} else if ($submit === "ajouter") {
    $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
    $annee = filter_input(INPUT_POST, "annee", FILTER_SANITIZE_SPECIAL_CHARS);

    if ($nom != null && $annee != null) {
        AjouterUneClasse($nom, $annee);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Classe</title>
</head>
<body>
    <h1>
        Ajouter une classe
    </h1>
    <form method="post">
        <div>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom">
        </div>
        <div>
            <label for="annee">Année Scolaire:</label>
            <input type="text" id="annee" name="annee">
        </div>
        <button type="submit" name="submit" value="retour">Retour</button>
        <button type="submit" name="submit" value="ajouter">Ajouter</button>
    </form>
</body>
</html>