<head>
  <link rel="stylesheet" href="">
    <h1>Result</h1>
    <title>Search</title>
</head>
  <body>
    <?php
        include('conndb.php');
        $name = $_POST['t_name'];
        $query = "SELECT * FROM teacher WHERE t_name LIKE '%$name%'";
        $result = mysqli_query($con, $query);
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
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row["t_id"] . "</td> ";
            echo "<td>" . $row["t_name"] . "</td> ";
            echo "<td>" . $row["t_surname"] . "</td> ";
            echo "<td>" . $row["t_gender"] . "</td> ";
            echo "<td>" . $row["t_course"] . "</td> ";
            echo "<td>" . $row["t_rank"] . "</td> ";
            echo "<td><a href='teacher_list_edit.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>Update</a></td> ";
            echo "<td><a href='teacher_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>Delete</a></td> ";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
    ?>
    <br> 
    <a href="index.php">Back to main</a>
    <a href="teacher_list.php">Back to list</a>
  </body>