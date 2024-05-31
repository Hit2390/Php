<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">EMS - Employee Management System</a>
            </div>
        </nav>
    </header>

    <div class="container col-xl-8 mt-5">
        <form action="LoginProcess.php" class="bg-light p-5" method="post" onsubmit="return LoginValidation()">
            <div>
                <h4 class="text-center">Login</h4>
            </div>
            <div>
                <?php
                if (isset($_SESSION["isRecordInserted"]))
                    echo $_SESSION["isRecordInserted"];
                    unset($_SESSION["isRecordInserted"]);
                ?>
            </div>

            <div class="mb-3 mt-3">
                <label for="inputEmail" class="form-label">Email:</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Enter email" name="inputEmail"
                    value="hitesh@gmail.com">
                <div id="inputEmailError" class="text-danger"></div>
            </div>

            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password:</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Enter password"
                    name="inputPassword" value="Hitesh@123">
                <div id="inputPasswordError" class="text-danger"></div>
            </div>

            <div class="form-check mb-3">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="inputRemember" value="1">
                    Remember me?
                </label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

    <!-- Latest compiled JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Login.js"></script>
</body>

</html>