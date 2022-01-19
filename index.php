<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Home";
$templateParams["titolo_pagina"] = "Home";
$templateParams["nome"] = "home.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);

$elementiCarrello=0;
if(isset($_COOKIE["elements"])){
    $elementiCarrello = $_COOKIE["elements"];
} 
else{
    setcookie("elements", "0");
}

$elementiPreferiti=0;
if(isset($_COOKIE["favElem"])){
    $elementiCarrello = $_COOKIE["favElem"];
} 
else{
    setcookie("favElem", "0");
}

//Home Template
$templateParams["prodotti"] = $dbh->getProduct();

require 'template/base.php';
?>