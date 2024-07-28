<meta charset="UTF-8">
<?php 
include('condb.php'); 
$id = $_REQUEST["ID"];

$sql = "DELETE FROM student WHERE s_id='$id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('ลบข้อมูลสำเร็จ');";
  echo "window.location = 'admin_student_list.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('เกิดข้อผิดพลาด! ลองใหม่อีกครั้ง');";
  echo "window.location = 'admin_student_list.php'; ";
  echo "</script>";
}
?>  