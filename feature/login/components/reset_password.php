<?php
session_start();
require_once(__DIR__ . "../../../../database/condb.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: forgot_password.php');
    exit();
}

// รับค่าจากฟอร์ม
$username = $_POST['username'] ?? '';
$new_password = $_POST['new_password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// ตรวจสอบข้อมูลเบื้องต้น
if (empty($username) || empty($new_password) || empty($confirm_password)) {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบ'); window.location = 'forgot_password.php';</script>";
    exit();
}

if ($new_password !== $confirm_password) {
    echo "<script>alert('รหัสผ่านไม่ตรงกัน'); window.location = 'forgot_password.php';</script>";
    exit();
}

if (strlen($new_password) < 6) {
    echo "<script>alert('รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร'); window.location = 'forgot_password.php';</script>";
    exit();
}

// เข้ารหัสรหัสผ่านใหม่
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// ตรวจสอบว่าเป็น student หรือ teacher
$is_found = false;

// 1. ลองค้นหาใน student
$stmt = mysqli_prepare($con, "SELECT s_id FROM student WHERE s_username = ?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) === 1) {
    $stmt_update = mysqli_prepare($con, "UPDATE student SET s_password = ? WHERE s_username = ?");
    mysqli_stmt_bind_param($stmt_update, "ss", $hashed_password, $username);
    mysqli_stmt_execute($stmt_update);
    $is_found = true;
}

// 2. ถ้าไม่ใช่ student ลองค้นหาใน teacher
if (!$is_found) {
    $stmt = mysqli_prepare($con, "SELECT t_id FROM teacher WHERE t_username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) === 1) {
        $stmt_update = mysqli_prepare($con, "UPDATE teacher SET t_password = ? WHERE t_username = ?");
        mysqli_stmt_bind_param($stmt_update, "ss", $hashed_password, $username);
        mysqli_stmt_execute($stmt_update);
        $is_found = true;
    }
}

// ✅ ผลลัพธ์
if ($is_found) {
    echo "<script>alert('เปลี่ยนรหัสผ่านสำเร็จ'); window.location = '../index.php';</script>";
} else {
    echo "<script>alert('ไม่พบชื่อผู้ใช้นี้ในระบบ'); window.location = 'forgot_password.php';</script>";
}

mysqli_close($con);