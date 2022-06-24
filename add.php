<?php
include 'base.php';
?>

<?php

if (isset($_POST['add'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $number = $_POST['number'];
    $query = "INSERT INTO `contacts` (`id`, `fname`, `lname`, `phone`) VALUES (NULL, '$first_name', '$last_name', '$number')";
    $res = mysqli_query($conn, $query);
}

?>

<title>Add contact</title>

<style>
    #sub {
        display: flex;
        justify-content: center;
    }
</style>

<body>
    <div class="container my-5">
        <form action="add.php" method="post">
            <div class="mb-3">
                <label for="first_name" class="form-label">Enter the first name</label>
                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="eg. Edward" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Enter the last name</label>
                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="eg. Yang" required>
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Enter the 10-digit number</label>
                <input type="text" id="number" name="number" class="form-control" placeholder="eg. 8997638711" required>
            </div>
            <div id="sub">
                <input type="submit" value="Add to contacts" name="add" id="add" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>