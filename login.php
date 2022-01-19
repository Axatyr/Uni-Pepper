<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Login";
$templateParams["nome"] = "login-form.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
//Login Template

require 'template/base.php';
?>