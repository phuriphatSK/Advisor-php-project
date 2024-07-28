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
    <h3><a class="heading" href="teacher_home.php">หน้าหลัก</a> »<a class="heading" href="teacher_student_list.php">ข้อมูลนักศึกษา</a> » รายวิชาที่ผ่าน</h3>
    <div style="text-align: center; font-size: 20px;">
        <?php
            include('condb.php');
            $id = $_REQUEST['ID'];
            $query_name = "SELECT s_name, s_surname FROM student WHERE s_id = '$id'";
            $result_name = mysqli_query($con, $query_name);
            if ($result_name) {
                $row = mysqli_fetch_array($result_name);
                echo "รหัสนักศึกษา: " . "$id" . " ชื่อ-นามสกุล: " . $row["s_name"]." ". $row["s_surname"];
            }
        ?>
    </div>
    <br>
    <div class="table-group">
    <?php
    include('condb.php');
    $id = $_REQUEST['ID'];

    $query_course = "SELECT c.c_id, c.c_name, r.s_id, r.c_id, r.r_year, r.r_grade FROM course c JOIN record r ON c.c_id = r.c_id WHERE r.s_id = '$id' ";
    $result_course = mysqli_query($con, $query_course);
    
    if ($result_course) {
        echo '<table class="table table-bordered table-striped">';
        echo "
            <tr>
                <th width='15%'>รหัสรายวิชา</th>
                <th width='10%'>ชื่อรายวิชา</th>
                <th width='15%'>ปีการศึกษา</th>
                <th width='15%'>เกรด</th>
            </tr>";

        while ($row = mysqli_fetch_array($result_course)) {
            echo "<tr>";
            echo "<td>" . $row["c_id"] . "</td>";
            echo "<td>" . $row["c_name"] . "</td>";
            echo "<td>" . $row["r_year"] . "</td>";
            echo "<td>" . $row["r_grade"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        mysqli_free_result($result_course);
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
    ?>
    </div>
    <br>
</body>

</html>
