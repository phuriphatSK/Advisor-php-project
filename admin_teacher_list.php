<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher</title>
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
    <h3><a class="heading" href="admin_home.php">หน้าหลัก</a> » ข้อมูลอาจารย์</h3>
    <div class='search'>
    <form name="search" action="admin_teacher_search.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-9">
                <input type="text" name="t_name" class="form-control" required placeholder="  ค้นหาชื่ออาจารย์">
            </div>
        </div>
    </form>
    </div>

    <div class="table-group">
    <?php
    include('condb.php');

    $query = "SELECT * FROM teacher ORDER BY t_id ";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<table class="table table-bordered table-striped">';
        echo "
            <tr>
                <th>ลำดับที่</th>
                <th width='15%'>ชื่อ</th>
                <th width='15%'>นามสกุล</th>
                <th width='15%'>เพศ</th>
                <th width='15%'>ตำแหน่งทางวิชาการ</th>
                <th width='15%'>หลักสูตร</th>
            </tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row["t_id"] . "</td>";
            echo "<td>" . $row["t_name"] . "</td>";
            echo "<td>" . $row["t_surname"] . "</td>";
            echo "<td>" . $row["t_gender"] . "</td>";
            echo "<td>" . $row["t_rank"] . "</td>";
            echo "<td>" . $row["t_course"] . "</td>";
            echo "<td class='edit'><a href='admin_teacher_list_edit.php?ID={$row["t_id"]}' class='btn btn-warning btn-xs'>แก้ไข</a></td>";
            echo "<td class='delete'><a href='admin_teacher_del_db.php?ID={$row["t_id"]}' onclick=\"return confirm('Do you want to delete this record?')\" class='btn btn-danger btn-xs'>ลบ</a></td>";
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
</body>
</html>
