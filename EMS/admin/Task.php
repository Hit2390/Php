<?php
require_once "../authentication/IsAuthenticated.php";
require_once "header.php";
require_once "../includes/header.php";
require_once "../includes/footer.php";


// Initialize variables and set default values
$action = 'insert';
$inputTask = '';
$inputTaskDescription = '';
$inputUsers[] = '';
?>
<div class="container mt-5">
    <form action="TaskProcess.php" class="bg-light p-5" method="post">
        <div>
            <h4 class="text-center">Task</h4>
        </div>
        <div class="mb-3 mt-3">
            <label for="inputTask" class="form-label">Task Name:</label>
            <input type="text" class="form-control" id="inputTask" placeholder="Enter Name" name="inputTask" ">
            <div id=" inputTaskError" class="text-danger">
        </div>
</div>
<?php
$query = "SELECT * FROM register WHERE registerRole='User'";
$response = mysqli_query($conn, $query);
$count = mysqli_num_rows($response);
if ($count > 0) {
    while ($row = mysqli_fetch_array($response)) {
        ?>
        <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="inputUsers[]" value="<?php echo $row["registerID"] ?>"><?php
                   echo $row["registerName"] ?>
            </label>
            <div id="inputUsersError" class="text-danger"></div>
        </div>
    <?php }
} ?>
<div class="mb-3 mt-3">
    <label for="inputTaskDescription" class="form-label">Task Description:</label>
    <textarea class="form-control" name="inputTaskDescription" id="inputTaskDescription" placeholder="Enter Address"
        rows="3"></textarea>
    <div id="inputTaskDescriptionError" class="text-danger"></div>
</div>



<div class="text-center">
    <button type="submit" class="btn btn-primary"><?php echo $action == 'insert' ? 'Add' : 'Update'; ?>
    </button>
    <button type="button" class="btn btn-primary">Clear</button>
</div>

<!-- <input type="hidden" name="action" value="<?php echo $action; ?>"> -->
<!-- <?php if ($action == 'update') { ?>
            <input type="hidden" name="registerID" value="<?php echo $registerID; ?>">
        <?php } ?> -->
</form>
</div>

<script src="../js/bootstrap.min.js"></script>
</body>

</html>