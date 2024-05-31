<?php
require_once "../authentication/IsAuthenticated.php";
require_once "header.php";
require_once "../includes/header.php";
require_once "../includes/footer.php";

?>

<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile Number</th>
                <th scope="col">Email Address</th>
                <th scope="col">Gender</th>
                <th scope="col">Department</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM register";
            $response = mysqli_query($conn, $query);
            $count = mysqli_num_rows($response);
            if ($count > 0) {
                while ($row = mysqli_fetch_array($response)) {
                    ?>
                    <tr>
                        <td><?php echo $row["registerID"]; ?></td>
                        <td><?php echo $row["registerName"]; ?></td>
                        <td><?php echo $row["registerEmail"]; ?></td>
                        <td><?php echo $row["registerMobile"]; ?></td>
                        <td><?php echo $row["registerAddress"]; ?></td>
                        <td><?php echo $row["registerGender"]; ?></td>
                        <td><?php echo $row["registerDepartment"]; ?></td>
                        <td><?php echo $row["registerRole"]; ?></td>
                        <td><a href="registration.php?action=edit&id=<?php echo $row["registerID"]; ?>">Edit</a> | <a
                                href="registrationProcess.php?action=delete&id=<?php echo $row["registerID"]; ?>">Delete</a>
                        </td>

                        <!-- <td><a href="EditForm.php?id=<?php echo $row["registerID"]; ?>">Edit</a> | <a href="DeleteProcess.php?id=<?php echo $row["registerID"]; ?>">Delete</a></td> -->
                    </tr>
                <?php
                }
            } else {
                echo "No records found";
            }
            ?>
        </tbody>
    </table>
</div>