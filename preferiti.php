<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Preferiti";
$templateParams["nome"] = "preferiti.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);

$elementiPreferiti=0;
if(isset($_COOKIE["favElem"])){
    $elementiCarrello = $_COOKIE["favElem"];
} 
else{
    setcookie("favElem", "0");
}
//Preferiti Template

require 'template/base.php';
?>