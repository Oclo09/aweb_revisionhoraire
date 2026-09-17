<?php
define("ROOT", "..");

require_once ROOT . "/functions/classes.php";

$submit = filter_input(INPUT_POST, "submit", FILTER_UNSAFE_RAW);

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$classe = LireUneClasse($id);

if ($submit === "annuler") {
    header("Location: lstClasses.php");
} else if ($submit === "valider") {
    $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
    $annee = filter_input(INPUT_POST, "annee", FILTER_SANITIZE_SPECIAL_CHARS);

    if ($nom != null && $annee != null) {
        ModifierUneClasse($id, $nom, $annee);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Classe</title>
</head>
<body>
    <h1>
        Modifier une classe
    </h1>
    <form method="post">
        <div>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?= $classe["nom"] ?>">
        </div>
        <div>
            <label for="annee">Année Scolaire:</label>
            <input type="text" id="annee" name="annee" value="<?= $classe["annee_scolaire"] ?>">
        </div>
        <button type="submit" name="submit" value="annuler">Annuler</button>
        <button type="submit" name="submit" value="valider">Valider</button>
    </form>
</body>
</html>