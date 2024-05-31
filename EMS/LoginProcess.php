<?php
session_start();
require_once "authentication/dbConnection.php";

$inputEmail = $_POST["inputEmail"];
$inputPassword = $_POST["inputPassword"];

// echo $inputEmail;
// echo $inputPassword;

$query = "SELECT * FROM register where registerEmail='$inputEmail' AND registerPassword='$inputPassword'";
$response = mysqli_query($conn, $query);
$count = mysqli_num_rows($response);
if ($count > 0) {
    $_SESSION["isLogin"] = session_id();
    // echo $_SESSION["isLogin"];
    $row = mysqli_fetch_array($response);
    $role = $row["registerRole"];
    $_SESSION["loginBy"]= $row["registerID"];
    echo $_SESSION["loginBy"];
    $role == "Admin" ? header("Location:admin/dashboard.php") : header("Location:employee/dashboard.php");
} else {
    // echo "No Record Found";
    header("Location:login.php");
}
?>