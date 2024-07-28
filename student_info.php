<!DOCTYPE html>
<html>
<head>
    <style>.heading {color: #000; margin-left: 10px ;text-decoration: none;}</style>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
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
</head>
<body>
    <?php
    include('navbar.php');
    ?>
    <h3><a class="heading" href="student_home.php">หน้าหลัก</a> » ข้อมูลส่วนตัว</h3>
    <?php
    session_start();

    if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'student') {
        header('Location: login.php');
        exit();
    }

    include('condb.php');
    $username = $_SESSION['username'];

    $query = "SELECT s.s_id, s.s_name, s.s_surname, s.s_gender, s.s_course, s.t_id, t.t_name ,t.t_surname
          FROM student s 
          JOIN teacher t ON s.t_id = t.t_id 
          WHERE s.s_id = '$username'";
    $result = mysqli_query($con, $query);



    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='container'>";
                echo  " รหัสนักศึกษา: " . $row["s_id"] . "<br>";
                echo  " ชื่อ-นามสกุล: " . $row["s_name"] . "    " . $row["s_surname"] . "<br>";
                echo  " เพศ: " . $row["s_gender"] . "<br>";
                echo  " หลักสูตร: " . $row["s_course"] . "<br>";
                echo  " อาจารย์ที่ปรึกษา : " . $row["t_name"] . "    " . $row["t_surname"]  . "<br><br>";
                echo  "<a style='text-decoration:none;' href='student_edit.php?ID={$row["s_id"]}' class='btn btn-warning btn-xs'>แก้ไขข้อมูล</a>";
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
