<?php
session_start();
require_once './dbcon.php';
if (!isset($_SESSION['user_login'])) {
    header('location: login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">SMS</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><i class="fa fa-user"></i> Welcome
                            <?php echo $_SESSION['user_login']; ?>
                        </a></li>
                    <li><a href="index.php?page=add-user"><i class="fa fa-user-plus"></i> Add User</a></li>
                    <li><a href="index.php?page=profile"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <a href="index.php?page=dashboard" class="list-group-item active">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                    <a href="index.php?page=add-student" class="list-group-item"><i class="fa fa-user-plus"></i> Add
                        Student</a>
                    <a href="index.php?page=all-students" class="list-group-item"><i class="fa fa-users"></i> All
                        Students</a>
                    <a href="index.php?page=all-users" class="list-group-item"><i class="fa fa-users"></i> All Users</a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="content">
                    <?php
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'] . '.php';
                    } else {
                        $page = "dashboard.php";
                    }

                    if (file_exists($page)) {
                        require_once $page;
                    } else {
                        require_once '404.php';
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-area">
        <p>Copyright &COPY: 2022 Student Mangement System.All Rights Are Reserved</p>
    </footer>
</body>

</html>