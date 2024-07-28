<?php
include('condb.php');

$name = $_POST["name"];
$surname = $_POST["surname"];
$gender = $_POST["gender"];
$rank = $_POST["rank"];
$course = $_POST["course"];
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "INSERT INTO teacher (t_name, t_surname, t_gender, t_course, t_rank, t_username, t_password) VALUES ('$name', '$surname', '$gender', '$course', '$rank', '$username', '$password')";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
mysqli_close($con);

if($result){
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "window.location = 'admin_teacher_list.php'; ";
    echo "</script>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('เกิดข้อผิดพลาด! ลองใหม่อีกครั้ง');";
    echo "window.location = 'admin_teacher_insert.php'; ";
    echo "</script>";
}
?>