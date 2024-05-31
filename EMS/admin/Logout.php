<?php
session_start();
unset($_SESSION["isLogin"]);
header("Location:../Login.php");
    ?>