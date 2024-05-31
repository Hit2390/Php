<!-- <?php
require_once "../authentication/IsAuthenticated.php";
require_once "../authentication/dbConnection.php"; // Assuming you have a file for database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['inputName']));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['inputEmail']));
    $mobile = mysqli_real_escape_string($conn, htmlspecialchars($_POST['inputMobileNumber']));
    $address = mysqli_real_escape_string($conn, htmlspecialchars($_POST['inputAddress']));
    $gender = mysqli_real_escape_string($conn, htmlspecialchars($_POST['inputGender']));
    $department = mysqli_real_escape_string($conn, htmlspecialchars($_POST['inputDepartment']));
    $role = mysqli_real_escape_string($conn, htmlspecialchars($_POST['inputRole']));
    $password = password_hash($_POST['inputPassword'], PASSWORD_BCRYPT); // No htmlspecialchars needed for password


    // Insert operation
    if (isset($_POST['action']) && $_POST['action'] == 'insert') {
        $stmt = $conn->prepare("INSERT INTO register (registerName, registerEmail, registerMobile, registerAddress, registerGender, registerDepartment, registerRole, registerPassword) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $email, $mobile, $address, $gender, $department, $role, $password);
    }

    // Update operation
    elseif (isset($_POST['action']) && $_POST['action'] == 'update' && isset($_POST['registerID'])) {
        $id = mysqli_real_escape_string($conn, $_POST['registerID']);
        $stmt = $conn->prepare("UPDATE register SET registerName=?, registerEmail=?, registerMobile=?, registerAddress=?, registerGender=?, registerDepartment=?, registerRole=?, registerPassword=? WHERE registerID=?");
        $stmt->bind_param("ssssssssi", $name, $email, $mobile, $address, $gender, $department, $role, $password, $id);
    }

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// Delete operation
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $stmt = $conn->prepare("DELETE FROM register WHERE registerID=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?> 