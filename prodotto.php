<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Prodotto";
$templateParams["nome"] = "singolo-prodotto.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);

//Singolo Prodotto Template
$idprodotto = -1;
if(isset($_GET["id"])){
    $idprodotto = $_GET["id"];
}
$templateParams["prodotto"] = $dbh->getProductById($idprodotto);


require 'template/base.php';
?>