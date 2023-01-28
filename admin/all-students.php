<div class="table-ressponsive">
    <table id="data" class="table table-hover table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Class</th>
            <th>City</th>
            <th>Contact</th>
            <th>Action</th>
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
            <td>
                <a href="index.php?page=update-student&id=<?php echo $row['id']; ?>" class="btn btn-xs btn-warning"><i
                        class="fa fa-pencil"></i>Edit</a>
                <a href="delete-student.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger"><i
                        class="fa fa-pencil"></i>Delete</a>
            </td>
        </tr>
        <?php }
        ?>
    </table>
</div>