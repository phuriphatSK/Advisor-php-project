<?php
session_start();
require_once(__DIR__ . "../../../../database/condb.php");

// ตรวจสอบว่ามีค่า POST มาหรือไม่
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    die("❌ กรุณากรอกชื่อผู้ใช้และรหัสผ่าน");
}

$username = trim($_POST['username']);
$password = $_POST['password']; // ไม่ต้อง escape เพราะใช้กับ password_verify

// ✅ ตรวจสอบ admin แบบกำหนดเอง (ไม่มี hash)
if ($username === 'admin' && $password === '12345') {
    $_SESSION['user_type'] = 'admin';
    $_SESSION['username'] = 'admin';
    header('Location: ../../admin/admin_home.php');
    exit();
}

// ✅ ตรวจสอบนักศึกษา
$query_student = "SELECT * FROM student WHERE s_username = ?";
$stmt_student = mysqli_prepare($con, $query_student);
mysqli_stmt_bind_param($stmt_student, "s", $username);
mysqli_stmt_execute($stmt_student);
$result_student = mysqli_stmt_get_result($stmt_student);

if ($result_student && mysqli_num_rows($result_student) === 1) {
    $student = mysqli_fetch_assoc($result_student);

    if (password_verify($password, $student['s_password'])) {
        $_SESSION['user_type'] = 'student';
        $_SESSION['username'] = $student['s_username'];
        $_SESSION['user_data'] = $student;
        header('Location: ../../student/student_home.php');
        exit();
    }
}

// ✅ ตรวจสอบอาจารย์
$query_teacher = "SELECT * FROM teacher WHERE t_username = ?";
$stmt_teacher = mysqli_prepare($con, $query_teacher);
mysqli_stmt_bind_param($stmt_teacher, "s", $username);
mysqli_stmt_execute($stmt_teacher);
$result_teacher = mysqli_stmt_get_result($stmt_teacher);

if ($result_teacher && mysqli_num_rows($result_teacher) === 1) {
    $teacher = mysqli_fetch_assoc($result_teacher);

    if (password_verify($password, $teacher['t_password'])) {
        $_SESSION['user_type'] = 'teacher';
        $_SESSION['username'] = $teacher['t_username'];
        $_SESSION['user_data'] = $teacher;
        header('Location: ../../teacher/teacher_home.php');
        exit();
    }
}

// ❌ ถ้า login ไม่ผ่าน
echo "<script type='text/javascript'>";
echo "alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง');";
echo "window.location = '../index.php';";
echo "</script>";

mysqli_close($con);
