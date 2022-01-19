<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Carrello";
$templateParams["titolo_pagina"] = "Il tuo carrello";
$templateParams["nome"] = "carrello.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);

$elementiPreferiti=0;
if(isset($_COOKIE["favElem"])){
    $elementiCarrello = $_COOKIE["favElem"];
} 
else{
    setcookie("favElem", "0");
}


//Carrello Template
$elementiCarrello=0;
if(isset($_COOKIE["elements"])){
    $elementiCarrello = $_COOKIE["elements"];
} 
else{
    setcookie("elements", "0");
}

require 'template/base.php';
?>