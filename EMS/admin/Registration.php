<?php
require_once "../authentication/IsAuthenticated.php";
require_once "../authentication/dbConnection.php";
require_once "../includes/header.php";
require_once "../includes/footer.php";

// Initialize variables and set default values
$action = 'insert';
$registerID = '';
$name = '';
$email = '';
$mobile = '';
$address = '';
$gender = '';
$department = '';
$role = '';

if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $action = 'update';
    $registerID = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM register WHERE registerID='$registerID'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_array($result)) {
        $name = htmlspecialchars($row['registerName']);
        $email = htmlspecialchars($row['registerEmail']);
        $mobile = htmlspecialchars($row['registerMobile']);
        $address = htmlspecialchars($row['registerAddress']);
        $gender = htmlspecialchars($row['registerGender']);
        $department = htmlspecialchars($row['registerDepartment']);
        $role = htmlspecialchars($row['registerRole']);
    }
}

require_once "header.php"; ?>
<div class="container col-xl-8 mt-5">
    <form action="registrationProcess.php" class="bg-light p-5" method="post" onsubmit="return RegistrationValidation()">
        <div>
            <h4 class="text-center">Registration</h4>
        </div>
        <div class="mb-3 mt-3">
            <label for="inputName" class="form-label">Name:</label>
            <input type="text" class="form-control" id="inputName" placeholder="Enter Name" name="inputName"
                value="<?php echo $name; ?>">
            <div id="inputNameError" class="text-danger"></div>
        </div>
        <div class="mb-3 mt-3">
            <label for="inputEmail" class="form-label">Email:</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Enter email" name="inputEmail"
                value="<?php echo $email; ?>">
            <div id="inputEmailError" class="text-danger"></div>
        </div>
        <div class="mb-3 mt-3">
            <label for="inputMobileNumber" class="form-label">Mobile Number:</label>
            <input type="number" class="form-control" id="inputMobileNumber" placeholder="Enter Mobile Number"
                name="inputMobileNumber" value="<?php echo $mobile; ?>">
            <div id="inputMobileNumberError" class="text-danger"></div>
        </div>
        <div class="mb-3 mt-3">
            <label for="inputAddress" class="form-label">Address:</label>
            <textarea class="form-control" name="inputAddress" id="inputAddress" placeholder="Enter Address"
                rows="3"><?php echo $address; ?></textarea>
            <div id="inputAddressError" class="text-danger"></div>
        </div>
        <div class="mb-3 mt-3">
            <label for="inputGender" class="form-label">Gender:</label>
            <div>
                <input type="radio" name="inputGender" value="Male" <?php if ($gender == 'Male') echo 'checked'; ?>> Male
                <input type="radio" name="inputGender" value="Female" <?php if ($gender == 'Female') echo 'checked'; ?>>
                Female
                <input type="radio" name="inputGender" value="Other" <?php if ($gender == 'Other') echo 'checked'; ?>>
                Other
            </div>
            <div id="inputGenderError" class="text-danger"></div>
        </div>
        <div class="mb-3 mt-3">
            <label for="inputDepartment" class="form-label">Department:</label>
            <select class="form-select" name="inputDepartment" id="inputDepartment">
                <option selected disabled>Select a Department</option>
                <option value="HR" <?php if ($department == 'HR') echo 'selected'; ?>>HR</option>
                <option value="Sales" <?php if ($department == 'Sales') echo 'selected'; ?>>Sales</option>
                <option value="Development" <?php if ($department == 'Development') echo 'selected'; ?>>Development</option>
            </select>
            <div id="inputDepartmentError" class="text-danger"></div>
        </div>
        <div class="mb-3 mt-3">
            <label for="inputRole" class="form-label">Role:</label>
            <div>
                <input type="radio" name="inputRole" value="Admin" <?php if ($role == 'Admin') echo 'checked'; ?>> Admin
                <input type="radio" name="inputRole" value="User" <?php if ($role == 'User') echo 'checked'; ?>> User
            </div>
            <div id="inputRoleError" class="text-danger"></div>
        </div>
        <div class="mb-3 mt-3">
            <label for="inputPassword" class="form-label">Password:</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Enter Password" name="inputPassword">
            <div id="inputPasswordError" class="text-danger"></div>
        </div>
        <div class="mb-3">
            <label for="inputConfirmPassword" class="form-label">Confirm Password:</label>
            <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Enter password"
                name="inputConfirmPassword">
            <div id="inputConfirmPasswordError" class="text-danger"></div>
        </div>
        <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="inputTerms" value="1" checked>Accept Terms and Conditions
            </label>
            <div id="inputTermsError" class="text-danger"></div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary"><?php echo $action == 'insert' ? 'Register' : 'Update'; ?></button>
            <button type="button" class="btn btn-primary">Clear</button>
        </div>
        <input type="hidden" name="action" value="<?php echo $action; ?>">
        <?php if ($action == 'update') { ?>
            <input type="hidden" name="registerID" value="<?php echo $registerID; ?>">
        <?php } ?>
    </form>
</div>
<script src="../js/Registration.js"></script>
