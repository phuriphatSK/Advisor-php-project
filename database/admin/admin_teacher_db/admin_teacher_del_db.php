<meta charset="UTF-8">
<?php
require_once(__DIR__ . "../../../condb.php");
$id = $_REQUEST["ID"];

$sql = "DELETE FROM teacher WHERE t_id='$id' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('ลบข้อมูลสำเร็จ');";
  echo "window.location = '../../../feature/admin/admin_teacher/admin_teacher_list.php'; ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('เกิดข้อผิดพลาด! ลองใหม่อีกครั้ง');";
  echo "window.location = '../../../feature/admin/admin_teacher/admin_teacher_list.php'; ";
  echo "</script>";
}
?>