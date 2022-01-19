<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - I miei dati";
$templateParams["nome"] = "dati.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);

//Home Template
$templateParams["dati"] = $dbh->getDati($_SESSION["idutente"]);

require 'template/base.php';
?>