<head>
    <title>ค้นหา</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>.heading {color: #000; margin-left: 10px ;text-decoration: none;}</style>
    <style>
      body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }
    </style>

</head>
  <body>
  <?php
    include('navbar.php');
  ?>
  <h3><a class="heading" href="admin_home.php">หน้าหลัก</a> » <a class="heading" href="admin_student_list.php">ข้อมูลนักศึกษา</a> » ค้นหานักศึกษา</h3>
  <div class="table-group">
    <?php
        include('condb.php');
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
            echo "<td class='edit'><a href='admin_student_list_edit.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'> แก้ไข </a></td> ";
            echo "<td class='delete'><a href='admin_student_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'> ลบ </a></td> ";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
    ?>
    </div>
    <br> 
  </body>