<?php
session_start();
if (!isset($_SESSION["isLogin"])) {
    header("Location:../Login.php");
}

require_once "dbConnection.php";
?>