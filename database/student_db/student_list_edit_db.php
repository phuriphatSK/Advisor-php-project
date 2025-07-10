<?php
require_once(__DIR__ . '../../../database/condb.php');

$id = $_POST["id"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$gender = $_POST["gender"];
$course = $_POST["course"];
$t_id = $_POST["t_id"];


$sql = "UPDATE student SET 
        s_name='$name',
        s_surname='$surname',
        s_gender='$gender',
        s_course='$course',
        t_id='$t_id'
        WHERE s_id='$id'";


$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
mysqli_close($con);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('อัพเดทข้อมูลสำเร็จ');";
    echo "window.location = '../../feature/student/list/student_list.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('เกิดข้อผิดพลาด! ลองใหม่อีกครั้ง');";
    echo "window.location = '../../feature/student/list/student_list.php'; ";
    echo "</script>";
}
