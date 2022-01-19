<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn()){
    header("location: login.php");
}
//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Preferiti";
$templateParams["nome"] = "preferiti.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
//Home Template
$templateParams["preferiti"] = $dbh->getPreferiti($_SESSION["idutente"]);

require 'template/base.php';
?>