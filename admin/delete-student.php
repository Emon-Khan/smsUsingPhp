<?php
require_once './dbcon.php';
$id = $_GET['id'];
mysqli_query($link, "DELETE FROM `student_info` WHERE `id` = $id") or die(mysqli_error($link));
header("location: index.php?page=all-students");
?>