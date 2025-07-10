<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../styles.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;

        }

        .section {
            width: 48%;
            padding: 20px;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container button {
            margin: 5px;
            padding: 10px 20px;
            font-size: 16px;
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
    <h1 style="text-align: center;">เจ้าหน้าที่</h1>
    <?php
    session_start();

    if ($_SESSION['user_type'] !== 'admin') {
        header('Location: ../../../login/index.php');
        exit();
    }
    ?>
    <div class="container">
        <div class="section">
            <h2>จัดการนักศึกษา</h2>
            <div class="button-container">
                <?php
                echo "<br>";
                echo "<form method='POST' action='/advisor-g5/feature/admin/admin_student/admin_student_list.php'>
                    <button style = 'font-size: 25px; cursor: pointer;' type='submit' class='btn' name='btnData'>ข้อมูลนักศึกษา</button>
                    </form>";

                echo "<br>";
                echo "<form method='POST' action='/advisor-g5/feature/admin/admin_student/admin_student_insert.php'>
                    <button style = 'font-size: 25px; cursor: pointer;' type='submit' class='btn' name='btnData'>เพิ่มข้อมูลนักศึกษา</button>
                    </form>";
                ?>
            </div>
        </div>
        <div class="section">
            <h2>จัดการอาจารย์</h2>
            <div class="button-container">
                <?php
                echo "<br>";
                echo "<form method='POST' action='/advisor-g5/feature/admin/admin_teacher/admin_teacher_list.php'>
                    <button style = 'font-size: 25px; cursor: pointer;' type='submit' class='btn' name='btnData'>ข้อมูลอาจารย์</button>
                    </form>";

                echo "<br>";
                echo "<form method='POST' action='/advisor-g5/feature/admin/admin_teacher/admin_teacher_insert.php'>
                    <button style = 'font-size: 25px; cursor: pointer;' type='submit' class='btn' name='btnData'>เพิ่มข้อมูลอาจารย์</button>
                    </form>";

                ?>
            </div>
        </div>
    </div>
</body>

</html>