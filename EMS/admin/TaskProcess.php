<?php
require_once "../authentication/IsAuthenticated.php";
require_once "../authentication/dbConnection.php"; // Assuming you have a file for database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Escape and retrieve form data
    $inputTask = mysqli_real_escape_string($conn, htmlspecialchars($_POST['inputTask']));
    $inputTaskDescription = mysqli_real_escape_string($conn, htmlspecialchars($_POST['inputTaskDescription']));
    $taskAssignBy = mysqli_real_escape_string($conn, htmlspecialchars($_SESSION['loginBy']));
    $inputUsers = $_POST['inputUsers'];

    // Prepare the INSERT statement
    $stmt = $conn->prepare("INSERT INTO task (taskName, taskDescription, taskMembers, taskAssignBy) VALUES (?, ?, ?, ?)");
    
    // Check if the statement was prepared successfully
    if ($stmt) {
        // Bind parameters and execute the statement inside the loop for each user
        foreach ($inputUsers as $user) {
            $stmt->bind_param("ssss", $inputTask, $inputTaskDescription, $user, $taskAssignBy);
            if ($stmt->execute()) {
                // Successfully executed, continue to next user
            } else {
                // Error occurred while executing the statement for this user
                echo "Error: " . $stmt->error;
            }
        }
        $stmt->close(); // Close the statement
        // All users processed, redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Error occurred while preparing the statement
        echo "Error: Unable to prepare statement.";
    }

    $conn->close(); // Close the database connection
}
?>
