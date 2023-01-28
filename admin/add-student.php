<?php
if (isset($_POST['add-student'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $class = $_POST['class'];
    //echo $name;
    //$query = "INSERT INTO `student_info`( `name`, `roll`, `city`, `pcontact`, `class`) VALUES ('$name','$roll','$city','$pcontact','$class')";
    //$quy = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`) VALUES ('$name','$roll','$class','$city','$pcontact')";
    $result = mysqli_query($link, "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`) VALUES ('$name','$roll','$class','$city','$pcontact')") or die(mysqli_error($link));
    if ($result) {
        $success = "Data Insert Success!";
    } else {
        $error = "Something might be wrong";
    }
} ?>
<div class="row">
    <?php if (isset($success)) {
        echo '<p class="alert alert-success col-sm-6">' . $success . '</p>';
    }
    if (isset($error)) {
        echo '<p class="alert alert-danger col-sm-6">' . $error . '</p>';
    }
    ?>
</div>
<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required="" />
            </div>
            <div class="form-group">
                <label for="roll">Student Roll</label>
                <input type="text" name="roll" placeholder="Roll" id="roll" class="form-control" required="" />
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" placeholder="City" id="city" class="form-control" required="" />
            </div>
            <div class="form-group">
                <label for="pcontact">Personal Contact</label>
                <input type="text" name="pcontact" placeholder="01*********" id="pcontact" class="form-control"
                    required="" />
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control" required="">
                    <option value="">Select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Add Student" name="add-student" class="btn btn-primary pull-right" />
            </div>
        </form>
    </div>
</div>