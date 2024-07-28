<meta charset="UTF-8">
<?php 
include('condb.php'); 
$id = $_REQUEST["ID"];

$sql = "DELETE FROM teacher WHERE t_id='$id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('ลบข้อมูลสำเร็จ');";
  echo "window.location = 'admin_teacher_list.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('เกิดข้อผิดพลาด! ลองใหม่อีกครั้ง');";
  echo "window.location = 'admin_teacher_list.php'; ";
  echo "</script>";
}
?>  