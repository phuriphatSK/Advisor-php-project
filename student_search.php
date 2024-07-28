<head>
    <h1>Result</h1>
    <title>ค้นหา</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
  <body>
  <div class="table-group">
    <?php
        include('conndb.php');
        $name = $_POST['s_name'];
        $query = "SELECT s.s_id, s.s_name, s.s_surname, s.s_gender, s.s_course, s.t_id, t.t_name ,t.t_surname
          FROM student s 
          JOIN teacher t ON s.t_id = t.t_id 
          WHERE s_name LIKE '%$name%'";

        $result = mysqli_query($con, $query);
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
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row["s_id"] . "</td>";
            echo "<td>" . $row["s_name"] . "</td>";
            echo "<td>" . $row["s_surname"] . "</td>";
            echo "<td>" . $row["s_gender"] . "</td>";
            echo "<td>" . $row["s_course"] . "</td>";
            echo "<td>" . $row["t_name"] ." ". $row["t_surname"] . "</td>";
            echo "<td><a href='student_list_edit.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'> แก้ไข </a></td> ";
            echo "<td><a href='student_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'> ลบ </a></td> ";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
    ?>
    </div>

    <br> 
    <a href="index.php">Back to main</a>
    <a href="student_list.php">Back to list</a>
  </body>