<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Termini";
$templateParams["titolo_pagina"] = "Termini";
$templateParams["nome"] = "termini.php";
$templateParams["pagina"] = "termini.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
if(isset($_SESSION["idutente"])){
    $templateParams["notifica"] = $dbh->getNotifiche($_SESSION["idutente"]);
}

require 'template/base.php';
?>