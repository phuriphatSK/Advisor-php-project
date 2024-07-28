<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="styles.css">
    <style>.heading {color: #000; margin-left: 10px ;text-decoration: none;}</style>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <?php
      include('navbar.php');
    ?>
    <h3><a class="heading" href="teacher_home.php">หน้าหลัก</a> » ข้อมูลนักศึกษา</h3>
    <div class="search">
        <form name="search" action="teacher_student_search.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-9">
                    <input type="text" name="s_name" class="form-control" required placeholder="    ค้นหาชื่อนักศึกษา">
                </div>
            </div>
        </form>
    </div>

    <div class="table-group">
    <?php
    session_start();
    if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'teacher') {
        header('Location: login.php');
        exit();
    }

    include('condb.php');
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    $query1 = "SELECT t_id FROM teacher WHERE t_username = '$username' AND t_password = '$password'";
    $result1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_array($result1);
    $t_id = $row1["t_id"];
    
    $query2 = "SELECT s_id, s_name, s_surname, s_gender, s_course
          FROM student WHERE t_id = '$t_id' ORDER BY s_id";
    $result2 = mysqli_query($con, $query2);
    
    

    if ($result2) {
        echo '<table class="table table-bordered table-striped">';
        echo "
            <tr>
                <th width='15%'>รหัสนักศึกษา</th>
                <th width='10%'>ชื่อ</th>
                <th width='15%'>นามสกุล</th>
                <th width='15%'>เพศ</th>
                <th width='20%'>หลักสูตร</th>
            </tr>";

        while ($row2 = mysqli_fetch_array($result2)) {
            echo "<tr>";
            echo "<td>" . $row2["s_id"] . "</td>";
            echo "<td>" . $row2["s_name"] . "</td>";
            echo "<td>" . $row2["s_surname"] . "</td>";
            echo "<td>" . $row2["s_gender"] . "</td>";
            echo "<td>" . $row2["s_course"] . "</td>";
            echo "<td class='edit'>
            <a href='teacher_student_course.php?ID={$row2[0]}' class='btn btn-warning btn-xs'> รายวิชาที่ผ่าน </a>
            </td>";
            echo "</tr>";
        }

        echo "</table>";
        mysqli_free_result($result2);
    } else {
        echo "ไม่พบข้อมูลนักศึกษาในที่ปรึกษา";
    }

    mysqli_close($con);
    ?>
    </div>
    <br>

</body>

</html>
