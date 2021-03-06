<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn()){
    header("location: login.php");
}
//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Carrello";
$templateParams["titolo_pagina"] = "Il tuo carrello";
$templateParams["nome"] = "carrello.php";
$templateParams["pagina"] = "carrello.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
if(isset($_SESSION["idutente"])){
    $templateParams["notifica"] = $dbh->getNotifiche($_SESSION["idutente"]);
}
//Carrello Template
$utente = $_SESSION["idutente"];
$currentCart = $dbh->checkEmptyCart($utente);

if(count($currentCart) != 0){
    $templateParams["prodottoCarrello"] = $dbh->getProductOnCart($currentCart[0]["IdOrdine"]);
}


require 'template/base.php';
?>