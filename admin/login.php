<?php
require_once './dbcon.php';
session_start();
if(isset($_SESSION['user_login'])){
    header('location: index.php');
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username`='$username'");
    if (mysqli_num_rows($username_check)) {
        $row = mysqli_fetch_assoc($username_check);
        if ($row['password'] == md5($password)) {
            if ($row['status'] == 'active') {
                $_SESSION['user_login'] = $username;
                header('location: index.php');
            } else {
                $account_status = "This account isn't activate yet";
            }
        } else {
            $wrong_password = "Password not match";
        }
    } else {
        $username_not_found = "Username not found";
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
    <title>Student Management System</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
</head>

<body>
    <div class="container animated shake">
        <h1 class="text-center">Student Management System</h1>
        <br />
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <h2 class="text-center">Admin Login Form</h2>
                <form action="login.php" method="POST">
                    <div class="">
                        <input type="text" placeholder="Username" name="username" required="" class="form-control"
                            value="<?php if (isset($username)) {
                                echo $username;
                            } ?>" />
                    </div>
                    <div class="">
                        <input type="password" placeholder="Password" name="password" required="" class="form-control"
                            value="<?php if (isset($password)) {
                                echo $password;
                            } ?>" />
                    </div>
                    <br />
                    <div class="">
                        <input class="btn btn-info pull-right" type="submit" value="Login" name="login" />
                    </div><a href="../">Back</a>
                </form>
                </br>
                <?php if (isset($username_not_found)) { ?>
                <div class="alert alert-danger">
                    <?php echo $username_not_found; ?>
                </div>
                <?php } ?>
                <?php if (isset($wrong_password)) {
                    echo '<div class="alert alert-danger">' . $wrong_password . '</div>';
                } ?>
                <?php if (isset($account_status)) {
                    echo '<div class="alert alert-danger">' . $account_status . '</div>';
                } ?>
            </div>
        </div>
    </div>
</body>

</html>