<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Home";
$templateParams["titolo_pagina"] = "Home";
$templateParams["nome"] = "home.php";
$templateParams["pagina"] = "index.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
if(isset($_SESSION["idutente"])){
$templateParams["notifica"] = $dbh->getNotifiche($_SESSION["idutente"]);
}
//Home Template
$templateParams["prodotti"] = $dbh->getProduct();

require 'template/base.php';
?>