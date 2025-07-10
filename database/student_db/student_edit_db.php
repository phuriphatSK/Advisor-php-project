<?php
require_once(__DIR__ . '../../../database/condb.php');
$id = $_POST['id'];
$name = $_POST['s_name'];
$surname = $_POST['s_surname'];

$sql = "UPDATE student SET s_name = '$name', s_surname = '$surname' WHERE s_id = '$id'";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
mysqli_close($con);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('อัพเดทข้อมูลสำเร็จ');";
    echo "window.location = '../../feature/student/info/student_info.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('เกิดข้อผิดพลาด! ลองใหม่อีกครั้ง');";
    echo "window.location = '../../feature/student/edit/student_edit.php'; ";
    echo "</script>";
}
