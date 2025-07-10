<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../../styles.css">
    <style>
        .heading {
            color: #000;
            margin-left: 10px;
            text-decoration: none;
        }
    </style>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <?php
    include('../../../components/navbar.php');
    ?>
</head>
<h3><a class="heading" href="../student_home.php">หน้าหลัก</a> » รายวิชาที่ผ่าน</h3>

<body>
    <div class="table-group">
        <?php
        session_start();

        if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'student') {
            header('Location: ../../../../login/index.php');
            exit();
        }

        include('../../../database/condb.php');

        $username = $_SESSION['username'];

        $query = "SELECT c.c_id, c.c_name, r.r_year, r.r_grade FROM course c, record r WHERE c.c_id = r.c_id AND r.s_id = '$username'";
        $result = mysqli_query($con, $query);
        echo "<br><br>";
        echo '<table class="table table-bordered table-striped">';
        echo "
            <tr>
                <th>รหัสรายวิชา</th>
                <th>ชื่อรายวิชา</th>
                <th>ปีการศึกษา</th>  
                <th>เกรด</th>                
            </tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row["c_id"] .  "</td> ";
            echo "<td>" . $row["c_name"] .  "</td> ";
            echo "<td>" . $row["r_year"] .  "</td> ";
            echo "<td>" . $row["r_grade"] .  "</td> ";
            echo "<td class='edit' ><a href='../course/student_course_edit.php?act=edit&ID=$row[0]'>แก้ไข</a></td> ";
            echo "<td class='delete' ><a href='../course/student_course_delete.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\">ลบ</a></td> ";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
        ?>
        <br>
    </div>
</body>

</html>