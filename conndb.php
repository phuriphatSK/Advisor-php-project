<?php
$con = mysqli_connect("localhost", "root", "", "advisor-g5");

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

mysqli_query($con, "SET NAMES 'utf8'");
date_default_timezone_set('Asia/Bangkok');
?>
