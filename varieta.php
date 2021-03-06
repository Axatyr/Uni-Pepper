<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Varieta";
$templateParams["titolo_pagina"] = "Varietà";
$templateParams["nome"] = "varieta.php";
$templateParams["pagina"] = "varieta.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
if(isset($_SESSION["idutente"])){
    $templateParams["notifica"] = $dbh->getNotifiche($_SESSION["idutente"]);
}

//Varieta Template
$idvarieta = -1;
if(isset($_GET["id"])){
    $idvarieta = $_GET["id"];
}

$templateParams["varieta"] = $dbh->getVariety();


require 'template/base.php';
?>