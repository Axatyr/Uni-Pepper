<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Ricette";
$templateParams["titolo_pagina"] = "Ricette";
$templateParams["nome"] = "menu-ricette.php";
$templateParams["pagina"] = "ricette.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
if(isset($_SESSION["idutente"])){
    $templateParams["notifica"] = $dbh->getNotifiche($_SESSION["idutente"]);
}
//Ricette Template
$templateParams["ricette"] = $dbh->getRecipe();

require 'template/base.php';
?>