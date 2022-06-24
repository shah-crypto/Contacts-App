<?php
include 'base.php';
?>

<title>Edit contact</title>

<style>
    #sub {
        display: flex;
        justify-content: center;
    }
</style>

<?php
if (isset($_GET['edit']))
{
    $eid = $_GET['edit'];
    $query = "SELECT * FROM contacts WHERE id = $eid";
    $res = mysqli_query($conn, $query);
    if ($res) {
        while ($row1 = mysqli_fetch_assoc($res)) {
            $uid = $row1['id'];
            $ufname = $row1['fname'];
            $ulname = $row1['lname'];
            $mob = $row1['phone'];
        }
    }
}

?>

<body>
    <div class="container my-5">
        <form action="add.php" method="post">
            <div class="mb-3">
                <label for="first_name" class="form-label">First name</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo $ufname; ?>" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last name</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $ulname; ?>" required>
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">10-digit number</label>
                <input type="text" id="number" name="number" class="form-control" value="<?php echo $mob; ?>" required>
            </div>
            <div id="sub">
                <input type="submit" value="Save changes" name="save" id="add" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>