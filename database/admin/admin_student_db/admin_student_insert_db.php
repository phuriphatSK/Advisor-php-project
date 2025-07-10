<?php
require_once(__DIR__ . "../../../condb.php");

$id = $_POST["id"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$gender = $_POST["gender"];
$course = $_POST["course"];
$t_id = $_POST["t_id"];
$password = $_POST["password"];

$sql = "INSERT INTO student (s_id, s_name, s_surname, s_gender, s_course, s_password, t_id) VALUES ('$id', '$name', '$surname', '$gender', '$course', '$password','$t_id')";
$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
mysqli_close($con);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "window.location = '../../../feature/admin/admin_student/admin_student_list.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('เกิดข้อผิดพลาด! ลองใหม่อีกครั้ง');";
    echo "window.location = '../../../feature/admin/admin_student/admin_student_insert.php'; ";
    echo "</script>";
}
