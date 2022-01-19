<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Privacy";
$templateParams["titolo_pagina"] = "Privacy";
$templateParams["nome"] = "privacy.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);

require 'template/base.php';
?>