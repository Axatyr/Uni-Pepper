<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Ricetta";
$templateParams["nome"] = "singola-ricetta.php";
$templateParams["pagina"] = "ricetta.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
if(isset($_SESSION["idutente"])){
    $templateParams["notifica"] = $dbh->getNotifiche($_SESSION["idutente"]);
}
//Ricetta Template
$idricetta = -1;
if(isset($_GET["id"])){
    $idricetta = $_GET["id"];
}
$templateParams["ricetta"] = $dbh->getRecipeById($idricetta);
$ingredientiRicetta = explode(',', $templateParams["ricetta"][0]["Ingredienti"]);



require 'template/base.php';
?>