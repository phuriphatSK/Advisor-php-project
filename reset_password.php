<?php
session_start();
include('condb.php');

if (isset($_POST['username']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $query_check_s_username = "SELECT * FROM student WHERE s_id='$username'";
    $result_check_s_username = mysqli_query($con, $query_check_s_username);

    $query_check_t_username = "SELECT * FROM teacher WHERE t_username='$username'";
    $result_check_t_username = mysqli_query($con, $query_check_t_username);

    if (mysqli_num_rows($result_check_s_username) == 1) {
        if ($new_password === $confirm_password) {
            $query_update_password = "UPDATE student SET s_password='$new_password' WHERE s_id='$username'";
            mysqli_query($con, $query_update_password);
            echo "<script type='text/javascript'>";
            echo "alert('เปลี่ยนรหัสผ่านสำเร็จ');";
            echo "window.location = 'login.php'; ";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('รหัสผ่านใหม่กับรหัสยืนยันไม่ตรงกัน');";
            echo "window.location = 'forgot_password.php'; ";
            echo "</script>";
        }
    } elseif (mysqli_num_rows($result_check_t_username) == 1) {
        if ($new_password === $confirm_password) {
            $query_update_password = "UPDATE teacher SET t_password='$new_password' WHERE t_username='$username'";
            mysqli_query($con, $query_update_password);
            echo "<script type='text/javascript'>";
            echo "alert('เปลี่ยนรหัสผ่านสำเร็จ');";
            echo "window.location = 'login.php'; ";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('รหัสผ่านใหม่กับรหัสยืนยันไม่ตรงกัน');";
            echo "window.location = 'forgot_password.php'; ";
            echo "</script>";
        }
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('ไม่พบชื่อผู้ใช้นี้');";
        echo "window.location = 'forgot_password.php'; ";
        echo "</script>";
    }

    mysqli_close($con);
}
?>
