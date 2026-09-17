<?php
define("ROOT", "..");

require_once ROOT . "/functions/classes.php";

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

SupprimerUneClasse($id);

header("Location: lstClasses.php");

exit();