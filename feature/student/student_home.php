<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        .container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            background-color: #87CEEB;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 40px;
            text-decoration: none;
            width: 400px;
            height: 100px;
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    include('../../components/navbar.php');
    ?>

    <?php
    session_start();

    if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'student') {
        header('Location: login.php');
        exit();
    }

    echo "<div class='container'>";
    echo "<h10 style = 'font-size: 50px;'>นักศึกษา</h10>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<form method='POST' action='../student/info/student_info.php'>
        <button style = 'font-size: 25px; cursor: pointer;' type='submit' class='btn' name='btnData'>ข้อมูลส่วนตัว</button>
      </form>";

    echo "<br>";
    echo "<form method='POST' action='../student/course/student_course.php'>
        <button style = 'font-size: 25px; cursor: pointer;' type='submit' class='btn' name='btnCourse'>รายวิชาที่ผ่าน</button>
      </form>";

    echo "<br>";
    echo "<form method='POST' action='../student/course/student_course_insert.php'>
        <button style = 'font-size: 25px; cursor: pointer;' type='submit' class='btn' name='btnInsert'>เพิ่มรายวิชาที่ผ่าน</button>
      </form>";
    echo "</div>";
    ?>
</body>

</html>

<?php


?>