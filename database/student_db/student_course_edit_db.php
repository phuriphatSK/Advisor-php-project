<?php
session_start();
require_once(__DIR__ . '../../../database/condb.php');
$username = $_SESSION['username'];
$id = $_POST['id'];
$year = $_POST['year'];
$grade = $_POST['grade'];

$sql = "UPDATE record SET r_year = '$year', r_grade = '$grade' WHERE c_id = '$id' AND s_id = '$username'" or die("Error:" . mysqli_error($con));
$result = mysqli_query($con, $sql);

mysqli_close($con);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('อัพเดทข้อมูลสำเร็จ');";
    echo "window.location = '../../feature/student/course/student_course.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('เกิดข้อผิดพลาด! ลองใหม่อีกครั้ง');";
    echo "window.location = '../../feature/student/course/student_course_edit.php'; ";
    echo "</script>";
}
