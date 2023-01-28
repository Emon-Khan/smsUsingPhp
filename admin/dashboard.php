<?php
require_once './dbcon.php';
?>
<h3>New Students</h3>
<div class="table-ressponsive">
    <table id="data" class="table table-hover table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Class</th>
            <th>City</th>
            <th>Contact</th>
        </tr>
        <?php
        $db_info = mysqli_query($link, "SELECT * FROM `student_info`");
        while ($row = mysqli_fetch_assoc($db_info)) { ?>
        <tr>
            <td>
                <?php echo $row['id']; ?>
            </td>
            <td>
                <?php echo $row['name']; ?>
            </td>
            <td>
                <?php echo $row['roll']; ?>
            </td>
            <td>
                <?php echo $row['class']; ?>
            </td>
            <td>
                <?php echo $row['city']; ?>
            </td>
            <td>
                <?php echo $row['pcontact']; ?>
            </td>
        </tr>
        <?php }
        ?>
    </table>
</div>