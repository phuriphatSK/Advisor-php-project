<head>
  <title>ค้นหา</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles.css">
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
</head>

<body>
  <?php
  include('../../../components/navbar.php');
  ?>
  <h3><a class="heading" href="../teacher_home.php">หน้าหลัก</a> » <a class="heading"
      href="teacher_student_list.php">ข้อมูลนักศึกษา</a> » ค้นหานักศึกษา</h3>
  <div class="table-group">
    <?php
    include('../../../database/condb.php');
    $name = $_POST['s_name'];
    $query = "SELECT s.s_id, s.s_name, s.s_surname, s.s_gender, s.s_course
          FROM student s WHERE s_name LIKE '%$name%'";

    $result = mysqli_query($con, $query);
    echo '<table class="table table-bordered table-striped">';
    echo "
            <tr>
                <th width='15%'>รหัสนักศึกษา</th>
                <th width='10%'>ชื่อ</th>
                <th width='15%'>นามสกุล</th>
                <th width='15%'>เพศ</th>
                <th width='20%'>หลักสูตร</th>           
            </tr>";
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row["s_id"] . "</td>";
      echo "<td>" . $row["s_name"] . "</td>";
      echo "<td>" . $row["s_surname"] . "</td>";
      echo "<td>" . $row["s_gender"] . "</td>";
      echo "<td>" . $row["s_course"] . "</td>";
      echo "<td class='edit'>
            <a href='../student/teacher_student_course.php?ID={$row[0]}' class='btn btn-warning btn-xs'> รายวิชาที่ผ่าน </a>
            </td>";
      echo "</tr>";
    }
    echo "</table>";
    mysqli_close($con);
    ?>
  </div>

  <br>
  <div class="btn-home">
  </div>
</body>