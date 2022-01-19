<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Ricette";
$templateParams["titolo_pagina"] = "Ricette";
$templateParams["nome"] = "menu-ricette.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
//Ricette Template
$templateParams["ricette"] = $dbh->getRecipe();

require 'template/base.php';
?>