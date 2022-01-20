<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Home";
$templateParams["titolo_pagina"] = "Home";
$templateParams["nome"] = "home.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);

//Home Template
$templateParams["prodotti"] = $dbh->getProduct();

require 'template/base.php';
?>