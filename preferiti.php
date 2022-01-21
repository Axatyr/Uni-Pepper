<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn()){
    header("location: login.php");
}
//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Preferiti";
$templateParams["titolo_pagina"] = "Preferiti";
$templateParams["nome"] = "preferiti.php";
$templateParams["pagina"] = "preferiti.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
if(isset($_SESSION["idutente"])){
    $templateParams["notifica"] = $dbh->getNotifiche($_SESSION["idutente"]);
}
//Home Template
$templateParams["preferiti"] = $dbh->getPreferiti($_SESSION["idutente"]);

require 'template/base.php';
?>