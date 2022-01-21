<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Privacy";
$templateParams["titolo_pagina"] = "Privacy";
$templateParams["nome"] = "privacy.php";
$templateParams["pagina"] = "privacy.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
if(isset($_SESSION["idutente"])){
    $templateParams["notifica"] = $dbh->getNotifiche($_SESSION["idutente"]);
}

require 'template/base.php';
?>