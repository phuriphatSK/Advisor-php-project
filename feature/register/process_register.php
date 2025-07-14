<?php
session_start();
require_once(__DIR__ . "../../../database/condb.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

function redirectError($msg)
{
    echo "<script>alert('$msg'); window.location = 'index.php';</script>";
    exit();
}

$role = $_POST['role'] ?? '';

if ($role === 'student') {
    $student_id = $_POST['student_id'] ?? '';
    $name = $_POST['student_name'] ?? '';
    $surname = $_POST['student_surname'] ?? '';
    $username = $_POST['student_username'] ?? '';
    $password_raw = $_POST['student_password'] ?? '';
    $confirm_password = $_POST['student_confirm_password'] ?? '';
    $course = $_POST['student_course'] ?? '';
    $gender = $_POST['student_gender'] ?? '';
    $advisor_id = $_POST['student_teacher'] ?? '';

    if (
        empty($student_id) || empty($username) || empty($name) || empty($surname) ||
        empty($course) || empty($gender) || empty($advisor_id) ||
        empty($password_raw) || empty($confirm_password)
    ) {
        redirectError("กรุณากรอกข้อมูลนักศึกษาให้ครบ");
    }

    if ($password_raw !== $confirm_password) {
        redirectError("รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง");
    }

    if (strlen($password_raw) < 6) {
        redirectError("รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร");
    }

    $hashed_password = password_hash($password_raw, PASSWORD_DEFAULT);

    // ตรวจสอบว่า s_id ซ้ำหรือไม่
    $check_query = "SELECT s_id FROM student WHERE s_id = ?";
    $stmt = mysqli_prepare($con, $check_query);
    mysqli_stmt_bind_param($stmt, "s", $student_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        redirectError("รหัสนักศึกษานี้มีอยู่แล้ว กรุณาใช้รหัสอื่น");
    }
    mysqli_stmt_close($stmt);

    // บันทึกข้อมูลนักศึกษา
    $insert_query = "INSERT INTO student 
        (s_id, s_password, s_username, s_name, s_surname, s_course, s_gender, t_id, s_role) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'นักศึกษา')";
    $stmt = mysqli_prepare($con, $insert_query);
    mysqli_stmt_bind_param($stmt, "ssssssss", $student_id, $hashed_password, $username, $name, $surname, $course, $gender, $advisor_id);
} elseif ($role === 'teacher') {
    $username = $_POST['teacher_username'] ?? '';
    $name = $_POST['teacher_name'] ?? '';
    $surname = $_POST['teacher_surname'] ?? '';
    $course = $_POST['teacher_course'] ?? '';
    $gender = $_POST['teacher_gender'] ?? '';
    $position = $_POST['teacher_position'] ?? '';
    $password_raw = $_POST['teacher_password'] ?? '';
    $confirm_password = $_POST['teacher_confirm_password'] ?? '';

    if (
        empty($username) || empty($name) || empty($surname) || empty($course) ||
        empty($gender) || empty($position) || empty($password_raw) || empty($confirm_password)
    ) {
        redirectError("กรุณากรอกข้อมูลอาจารย์ให้ครบ");
    }

    if ($password_raw !== $confirm_password) {
        redirectError("รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง");
    }

    if (strlen($password_raw) < 6) {
        redirectError("รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร");
    }

    $hashed_password = password_hash($password_raw, PASSWORD_DEFAULT);

    // ตรวจสอบชื่อผู้ใช้ซ้ำ
    $check_query = "SELECT t_username FROM teacher WHERE t_username = ?";
    $stmt = mysqli_prepare($con, $check_query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        redirectError("ชื่อผู้ใช้นี้มีอยู่แล้ว กรุณาใช้ชื่อผู้ใช้อื่น");
    }
    mysqli_stmt_close($stmt);

    // บันทึกข้อมูลอาจารย์
    $insert_query = "INSERT INTO teacher 
        (t_username, t_password, t_name, t_surname, t_course, t_gender, t_rank, t_role) 
        VALUES (?, ?, ?, ?, ?, ?, ?, 'อาจารย์')";
    $stmt = mysqli_prepare($con, $insert_query);
    mysqli_stmt_bind_param($stmt, "sssssss", $username, $hashed_password, $name, $surname, $course, $gender, $position);
} else {
    redirectError("กรุณาเลือกตำแหน่งที่ถูกต้อง");
}

// execute การ insert
if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('ลงทะเบียนสำเร็จ กรุณาเข้าสู่ระบบ'); window.location = '/advisor-g5/feature/login/index.php';</script>";
} else {
    redirectError("เกิดข้อผิดพลาดในการลงทะเบียน: " . mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);
mysqli_close($con);
