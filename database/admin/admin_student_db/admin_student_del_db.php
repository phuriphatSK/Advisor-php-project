<meta charset="UTF-8">
<?php
require_once(__DIR__ . "../../../condb.php");
$id = $_GET["ID"];

$sql = "DELETE FROM student WHERE s_id='$id' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('ลบข้อมูลสำเร็จ');";
  echo "window.location = '../../../feature/admin/admin_student/admin_student_list.php'; ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('เกิดข้อผิดพลาด! ลองใหม่อีกครั้ง');";
  echo "window.location = '../../../feature/admin/admin_student/admin_student_list.php'; ";
  echo "</script>";
}
?>