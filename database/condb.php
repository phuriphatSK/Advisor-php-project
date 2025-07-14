<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "advisor-g5";

$con = mysqli_connect($host, $username, $password, $database, 3307);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

mysqli_query($con, "SET NAMES 'utf8'");
date_default_timezone_set('Asia/Bangkok');
