<?php
session_start();
include('condb.php');

$username = $_POST['username'];
$password = $_POST['password'];

$query_check_s_username = "SELECT * FROM student WHERE s_id='$username'";
$result_check_s_username = mysqli_query($con, $query_check_s_username);

$query_check_s_password = "SELECT * FROM student WHERE s_password='$password'";
$result_check_s_password = mysqli_query($con, $query_check_s_password);

$query_check_t_username = "SELECT * FROM teacher WHERE t_username='$username'";
$result_check_t_username = mysqli_query($con, $query_check_t_username);

$query_check_t_password = "SELECT * FROM teacher WHERE t_password='$password'";
$result_check_t_password = mysqli_query($con, $query_check_t_password);

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($username === 'admin' && $password === '12345') {
        $_SESSION['user_type'] = 'admin';
        header('Location: admin_home.php');
    } elseif (mysqli_num_rows($result_check_s_username) == 1) {
        if (mysqli_num_rows($result_check_s_password) == 1) {
            $_SESSION['user_type'] = 'student';
            $_SESSION['username'] = $username;
            header('Location: student_home.php');
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('รหัสผ่านไม่ถูกต้อง');";
            echo "window.location = 'login.php'; ";
            echo "</script>";
        }
    } elseif (mysqli_num_rows($result_check_t_username) == 1) {
        if (mysqli_num_rows($result_check_t_password) == 1) {
            $_SESSION['user_type'] = 'teacher';
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('Location: teacher_home.php');
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('รหัสผ่านไม่ถูกต้อง');";
            echo "window.location = 'login.php'; ";
            echo "</script>";
        }
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('เข้าสู่ระบบผิดพลาด กรุณาลองใหม่อีกครั้ง');";
        echo "window.location = 'login.php'; ";
        echo "</script>";
    }
}
?>
