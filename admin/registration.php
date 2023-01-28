<?php
require_once './dbcon.php';
session_start();
if (isset($_POST['registration'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    //$photo = $_FILES['photo']['name'];
    /*$photo = explode('.',$_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username.".".$photo;*/
    //echo $photo_name;
    /*echo '<pre>';
    print_r($_POST);
    echo '</pre>';*/
    $input_error = array();
    if (empty($name)) {
        $input_error['name'] = "The name field is required";
    }
    if (empty($email)) {
        $input_error['email'] = "The email field is required";
    }
    if (empty($username)) {
        $input_error['username'] = "The username field is required";
    }
    if (empty($password)) {
        $input_error['password'] = "The password field is required";
    }
    if (empty($c_password)) {
        $input_error['c_password'] = "The confirm password field is required";
    }
    /*echo'<pre>';
    print_r($input_error);
    echo'</pre>';*/
    //print_r(count($input_error));
    if (count($input_error) == 0) {
        $email_check = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$email';");
        if (mysqli_num_rows($email_check) == 0) {
            $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username';");
            if (mysqli_num_rows($username_check) == 0) {
                if (strlen($username) > 8) {
                    if (strlen($password) > 8) {
                        if ($password == $c_password) {
                            $password = md5($password);
                            $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `status`) VALUES ('$name', '$email', '$username', '$password', 'inactive')";
                            $result = mysqli_query($link, $query);
                            if ($result) {
                                $_SESSION['data_insert_success'] = "Data Insert Successfully!";
                                header('location: registration.php');
                            } else {
                                $_SESSION['data_insert_error'] = "Data Insert Error!";
                            }
                        } else {
                            $password_not_match = "Confirm password not match";
                        }
                    } else {
                        $password_l = "Password length has to be more than 8 characters";
                    }
                } else {
                    $username_l = "Username length has to be more than 8 characters";
                }
            } else {
                $username_error = "This Username is already taken.";
            }
        } else {
            $email_error = "This email address is already taken.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Registration Form</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>User Registration Form</h1>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-1" for="name">Name</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Enter Your Name"
                                value="<?php if (isset($name)) {
                                    echo $name;
                                } ?>" />
                        </div>
                        <label class="error">
                            <?php if (isset($input_error['name'])) {
                                echo $input_error['name'];
                            } ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-1" for="email">Email</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="email" type="email" name="email"
                                placeholder="Enter Your Email" value="<?php if (isset($email)) {
                                    echo $email;
                                } ?>" />
                        </div>
                        <label class="error">
                            <?php if (isset($input_error['email'])) {
                                echo $input_error['email'];
                            } ?>
                        </label>
                        <label class="error">
                            <?php if (isset($email_error)) {
                                echo $email_error;
                            } ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-1" for="username">Username</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="username" type="text" name="username"
                                placeholder="Enter Your Username" value="<?php if (isset($username)) {
                                    echo $username;
                                } ?>" />
                        </div>
                        <label class="error">
                            <?php if (isset($input_error['username'])) {
                                echo $input_error['username'];
                            } ?>
                        </label>
                        <label class="error">
                            <?php if (isset($username_error)) {
                                echo $username_error;
                            } ?>
                        </label>
                        <label class="error">
                            <?php if (isset($username_l)) {
                                echo $username_l;
                            } ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-1" for="password">Password</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="password" type="password" name="password"
                                placeholder="Enter Your Password" value="<?php if (isset($password)) {
                                    echo $password;
                                } ?>" />
                        </div>
                        <label class="error">
                            <?php if (isset($input_error['password'])) {
                                echo $input_error['password'];
                            } ?>
                        </label>
                        <label class="error">
                            <?php if (isset($password_l)) {
                                echo $password_l;
                            } ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-1" for="c_password">Confirm Password</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="c_password" type="password" name="c_password"
                                placeholder="Enter Your Confirm Password" value="<?php if (isset($c_password)) {
                                    echo $c_password;
                                } ?>" />
                        </div>
                        <label class="error">
                            <?php if (isset($input_error['c_password'])) {
                                echo $input_error['c_password'];
                            } ?>
                        </label>
                        <label class="error">
                            <?php if (isset($password_not_match)) {
                                echo $password_not_match;
                            } ?>
                        </label>
                    </div>
                    <!--<div class="form-group">
                        <label class="control-label col-sm-1" for="photo">Photo</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="photo" type="file" name="photo"/>
                        </div>
                    </div>-->
                    <div class="col-sm-4 col-sm-offset-1">
                        <input type="submit" value="Registration" name="registration" class="btn btn-primary " />
                    </div>
                </form>
            </div>
        </div>
        <br />
        <br />
        <p>If you have an account?Then please <a href="login.php">Login</a></p>
        <hr />
        <footer>
            <p>Copyright &copy: 2020 -
                <?php echo date('Y') ?> All Rights Reserved.
            </p>
        </footer>
    </div>
</body>

</html>