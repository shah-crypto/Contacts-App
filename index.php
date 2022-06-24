<?php
include 'base.php';
?>

<title>Home page</title>

<style>
    .container #add_link {
        position: relative;
        float: right;
    }

    .table-responsive {
        text-align: center;
    }

    .initials {
        background-color: lightblue;
        border-radius: 50%;
        padding: 5px;
    }
</style>

<?php

$query = "SELECT * FROM contacts ORDER BY fname";

?>

<div class="container">
    <a href="add.php" class="btn btn-primary mb-3" id="add_link">+ Add new contact</a>
    <div class="text-center mb-3">
        <input type="text" name="search" id="search" class="form-control" placeholder="Start typing here to search">
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="contacts-table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Initials</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>

            <?php
            $result1 = mysqli_query($conn, $query);
            if ($result1) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $uid = $row1['id'];
                    $ufname = $row1['fname'];
                    $ulname = $row1['lname'];
                    $mob = $row1['phone'];
            ?>

                    <tbody>
                        <tr class="rows">
                            <td><span class="initials"><?php echo $ufname[0] . $ulname[0]; ?></span></td>
                            <td><?php echo $ufname . " " . $ulname; ?></td>
                            <td>+91 <?php echo $mob; ?></td>
                            <td><a href="edit.php?edit=<?php echo $uid; ?>" class="btn btn-sm btn-warning">Edit <i class="fa-solid fa-pencil"></i></a></td>
                            <td><a href="index.php?delete=<?php echo $uid; ?>" class="btn btn-sm btn-danger">Delete <i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    </tbody>
            <?php
                }
            }
            ?>

        </table>
    </div>
</div>

<?php
if (isset($_GET['delete'])) {
    $del_id = $_GET['delete'];
    $query1 = "DELETE FROM contacts WHERE id = '$del_id'";
    $result = mysqli_query($conn, $query1);
    header("Location: index.php");
}
?>

<script>
    $(document).ready(function() {
        $('#search').keyup(function() {
            search_table($(this).val());
        });

        function search_table(value) {
            $('#contacts-table .rows').each(function() {
                var found = 'false';
                $(this).each(function() {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                        found = 'true';
                    }
                });
                if (found === 'true') {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>