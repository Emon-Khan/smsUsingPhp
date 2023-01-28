<?php
$id = $_GET['id'];
$db_data = mysqli_query($link, "SELECT * FROM `student_info` WHERE `id` = $id") or die(mysqli_error($link));
$db_row = mysqli_fetch_assoc($db_data);

if (isset($_POST['update-student'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $class = $_POST['class'];
    //echo $name;
    //$query = "INSERT INTO `student_info`( `name`, `roll`, `city`, `pcontact`, `class`) VALUES ('$name','$roll','$city','$pcontact','$class')";
    //$quy = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`) VALUES ('$name','$roll','$class','$city','$pcontact')";
    $result = mysqli_query($link, "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact' WHERE `id` = '$id'") or die(mysqli_error($link));
    if ($result) {
        header('location: index.php?page=all-students');
    }
}
?>
<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required=""
                    value="<?= $db_row['name'] ?>" />
            </div>
            <div class="form-group">
                <label for="roll">Student Roll</label>
                <input type="text" name="roll" placeholder="Roll" id="roll" class="form-control" required=""
                    value="<?= $db_row['roll'] ?>" />
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" placeholder="City" id="city" class="form-control" required=""
                    value="<?= $db_row['city'] ?>" />
            </div>
            <div class="form-group">
                <label for="pcontact">Personal Contact</label>
                <input type="text" name="pcontact" placeholder="01*********" id="pcontact" class="form-control"
                    required="" value="<?= $db_row['pcontact'] ?>" />
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control" required="">
                    <option value="">Select</option>
                    <option <?php echo $db_row['class'] == '1st' ? 'selected=""' : ''; ?> value="1st">1st</option>
                    <option <?php echo $db_row['class'] == '2nd' ? 'selected=""' : ''; ?> value="2nd">2nd</option>
                    <option <?php echo $db_row['class'] == '3rd' ? 'selected=""' : ''; ?> value="3rd">3rd</option>
                    <option <?php echo $db_row['class'] == '4th' ? 'selected=""' : ''; ?> value="4th">4th</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Update Student" name="update-student" class="btn btn-primary pull-right" />
            </div>
        </form>
    </div>
</div>