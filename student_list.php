<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>หน้าหลัก » ข้อมูลนักศึกษา</h1>
    <div class="search">
        <form name="search" action="student_search.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-9">
                    <input type="text" name="s_name" class="form-control" required placeholder="    ค้นหาชื่อนักศึกษา">
                </div>
            </div>
        </form>
    </div>

    <div class="table-group">
    <?php
    include('conndb.php');

    $query = "SELECT s.s_id, s.s_name, s.s_surname, s.s_gender, s.s_course, s.t_id, t.t_name ,t.t_surname
          FROM student s 
          JOIN teacher t ON s.t_id = t.t_id 
          ORDER BY s.s_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<table class="table table-bordered table-striped">';
        echo "
            <tr>
                <th width='15%'>รหัสนักศึกษา</th>
                <th width='10%'>ชื่อ</th>
                <th width='15%'>นามสกุล</th>
                <th width='15%'>เพศ</th>
                <th width='20%'>หลักสูตร</th>
                <th width='15%'>อาจารย์ที่ปรึกษา</th>
            </tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row["s_id"] . "</td>";
            echo "<td>" . $row["s_name"] . "</td>";
            echo "<td>" . $row["s_surname"] . "</td>";
            echo "<td>" . $row["s_gender"] . "</td>";
            echo "<td>" . $row["s_course"] . "</td>";
            echo "<td>" . $row["t_name"] ." ". $row["t_surname"] . "</td>";
            echo "<td class='edit'>
            <a href='student_list_edit.php?ID={$row[0]}' class='btn btn-warning btn-xs'> แก้ไข </a>
            </td>";
            echo "<td class='delete'>
            <a href='student_del_db.php?ID={$row[0]}' onclick=\"return confirm('Do you want to delete this record?')\" class='btn btn-danger btn-xs'> ลบ </a>
            </td>";
            echo "</tr>";
        }

        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
    ?>
    </div>
    <br>

    <div class="btn-home">
    <a href="index.php">กลับสู่หน้าหลัก</a>
    </div>
</body>

</html>
