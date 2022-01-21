<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Assistente";
$templateParams["titolo_pagina"] = "Assistente";
$templateParams["nome"] = "assistente.php";
$templateParams["pagina"] = "assistente.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
if(isset($_SESSION["idutente"])){
    $templateParams["notifica"] = $dbh->getNotifiche($_SESSION["idutente"]);
}

//Assistente Template
$iddomanda = 1;
if(isset($_COOKIE["iddomanda"])){
    $iddomanda = $_COOKIE["iddomanda"];
}
$templateParams["domanda"] = $dbh->getQuestionById($iddomanda);


// Risultato
$risultato=-1;
if(isset($_COOKIE["risultato"])){
    $risultato = $_COOKIE["risultato"];
}

$templateParams["risultato"] = $dbh->getVarietyById($risultato);


require 'template/base.php';
?>