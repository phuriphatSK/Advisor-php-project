<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
            background-color: #0099CC;
            padding: 15px;
            text-align: left;
            color: #FFFFFF;
        }

        .topnavExit {
            text-align: right;
            color: #FFFFFF;
            height: 50px;
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
    <div class="contianer" style="text-align: center;">
        <?php
        session_start();

        if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'teacher') {
            header('Location: login.php');
            exit();
        }

        echo "<h1> อาจารย์ </h1>";
        echo "<br>";
        echo "<form method='POST' action='/advisor-g5/feature/teacher/info/teacher_info.php'>
        <button style = 'font-size: 25px; cursor: pointer;' type='submit' class='btn' name='btnData'>ข้อมูลส่วนตัว</button>
        </form>";

        echo "<br>";
        echo "<form method='POST' action='/advisor-g5/feature/teacher/student/teacher_student_list.php'>
        <button style = 'font-size: 25px; cursor: pointer;' type='submit' class='btn' name='btnCourse'>ข้อมูลนักศึกษา</button>
        </form>";

        ?>
    </div>

</body>

</html>