<?php
include 'base.php';
?>

<title>Home page</title>

<?php

$query = "SELECT * FROM contacts ORDER BY fname";

?>

<div class="container">
    <div class="text-center mb-3">
        <input type="text" name="search" id="search" class="form-control" placeholder="Start typing here to search">
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="contacts-table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Mobile Number</th>
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
                            <td><?php echo $uid; ?></td>
                            <td><?php echo $ufname; ?></td>
                            <td><?php echo $ulname; ?></td>
                            <td>+91 <?php echo $mob; ?></td>
                        </tr>
                    </tbody>
            <?php
                }
            }
            ?>

        </table>
    </div>
</div>

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