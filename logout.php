<?php
require_once 'bootstrap.php';

unset($_SESSION['idutente']);
session_destroy();
header("Location: login.php");
?>