<?php
session_start();
require_once(__DIR__ . '../../../../database/condb.php');
$id = $_REQUEST["ID"];
$username = $_SESSION['username'];

$sql = "DELETE FROM record WHERE c_id='$id' AND s_username='$username' ";
$result = mysqli_query($con, $sql);

if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('ลบข้อมูลสำเร็จ');";
  echo "window.location = 'student_course.php';";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('เกิดข้อผิดพลาด! ลองใหม่อีกครั้ง');";
  echo "window.location = 'student_course.php';";
  echo "</script>";
}
