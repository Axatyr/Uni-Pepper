<?php
session_start();
define("UPLOAD_DIR", "./upload/");
define("UPLOAD_DIR_VARIETY", "./upload/variety/");
define("UPLOAD_DIR_RECIPES", "./upload/recipes/");
define("UPLOAD_DIR_USER", "./upload/user/");
require_once("utils/functions.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "unipeppers", 3306);
?>