<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f9fa;
        }
        .btn {
            background-color: #87CEEB; 
            color: black;
            border: none; 
            border-radius: 10px; 
            padding: 10px 30px;
            font-size: 16px;
            cursor: pointer;
        }
        .container {
            color: black;
            font-size: 30px;
            text-align: center;
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 60px;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
    <style>.heading {color: #000; margin-left: 10px ;text-decoration: none;}</style>
</head>

<body>
    <?php
      include('navbar.php');
    ?>
    <h3><a class="heading" href="teacher_home.php">หน้าหลัก</a> » ข้อมูลส่วนตัว</h3>

    <?php
    session_start();

    if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'teacher') {
        header('Location: login.php');
        exit();
    }

    include('condb.php');

    $username = $_SESSION['username'];

    $query = "SELECT * FROM teacher WHERE t_username='$username'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='container'>";
                echo  " ชื่อ - นามสกุล : " . $row["t_name"] . "    " . $row["t_surname"] . "<br>";
                echo  " เพศ  : " . $row["t_gender"] . "<br>";
                echo  " ตำแหน่งทางวิชาการ  : " . $row["t_rank"] . "<br>";
                echo  " หลักสูตร  : " . $row["t_course"] . "<br><br>";
                echo  "<a style='text-decoration:none;' href='teacher_edit.php?ID={$row["t_id"]}' class='btn btn-warning btn-xs'>แก้ไขข้อมูล</a>";
                echo "</div>";
            }

        } else {
            echo "0 results";
        }
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_close($con);
    ?>
</body>
</html>