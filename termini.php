<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Termini";
$templateParams["titolo_pagina"] = "Termini";
$templateParams["nome"] = "termini.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);

require 'template/base.php';
?>