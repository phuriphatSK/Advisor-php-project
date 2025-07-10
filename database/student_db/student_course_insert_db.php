<?php
session_start();
include('../condb.php');
$username = $_SESSION['username'];
$id = $_POST['id'];
$name = $_POST['name'];
$year = $_POST['year'];
$grade = $_POST['grade'];

$sqlID = "SELECT c_id FROM course WHERE c_id = '$id'" or die("Error:" . mysqli_error($con));
$cID = mysqli_query($con, $sqlID);

if (mysqli_num_rows($cID) > 0) {
    $sql = "INSERT INTO record (s_id,c_id,r_year,r_grade) VALUES ('$username','$id','$year','$grade')" or die("Error:" . mysqli_error($con));
    $result = mysqli_query($con, $sql);
} else {
    $sql1 = "INSERT INTO course (c_id,c_name) VALUES ('$id','$name')" or die("Error:" . mysqli_error($con));
    $result1 = mysqli_query($con, $sql1);

    $sql2 = "INSERT INTO record (s_id,c_id,r_year,r_grade) VALUES ('$username','$id','$year','$grade')" or die("Error:" . mysqli_error($con));
    $result2 = mysqli_query($con, $sql2);
};
mysqli_close($con);

if ($result || ($result1 && $result2)) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "window.location = '../../feature/student/course/student_course.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('เกิดข้อผิดพลาด! ลองใหม่อีกครั้ง');";
    echo "window.location = '../../feature/student/course/student_course_insert.php'; ";
    echo "</script>";
}
