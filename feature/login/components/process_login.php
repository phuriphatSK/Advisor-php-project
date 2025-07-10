<?php
session_start();
require_once(__DIR__ . "/../../../database/condb.php");

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    die("❌ กรุณาส่งค่ามาจากฟอร์ม login ก่อน");
}

$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);


// เช็ค login นักเรียน
$query_student = "SELECT * FROM student WHERE s_id='$username' AND s_password='$password'";
$result_student = mysqli_query($con, $query_student);

// เช็ค login อาจารย์
$query_teacher = "SELECT * FROM teacher WHERE t_username='$username' AND t_password='$password'";
$result_teacher = mysqli_query($con, $query_teacher);

// ตรวจสอบว่ามีค่า POST ส่งมาหรือไม่
if ($username === 'admin' && $password === '12345') {
    $_SESSION['user_type'] = 'admin';
    header('Location: ../../admin/admin_home.php');
    exit();
} elseif (mysqli_num_rows($result_student) == 1) {
    $_SESSION['user_type'] = 'student';
    $_SESSION['username'] = $username;
    header('Location: ../../student/student_home.php');
    exit();
} elseif (mysqli_num_rows($result_teacher) == 1) {
    $_SESSION['user_type'] = 'teacher';
    $_SESSION['username'] = $username;
    header('Location: ../../teacher/teacher_home.php');
    exit();
} else {
    echo "<script type='text/javascript'>";
    echo "alert('เข้าสู่ระบบผิดพลาด กรุณาลองใหม่อีกครั้ง');";
    echo "window.location = '../index.php'; ";
    echo "</script>";
}
