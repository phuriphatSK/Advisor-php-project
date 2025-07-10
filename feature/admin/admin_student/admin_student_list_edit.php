<?php
require_once(__DIR__ . "/../../../database/condb.php");

$id = $_REQUEST["ID"];
$sql = "SELECT * FROM student WHERE s_id ='$id' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
$row = mysqli_fetch_array($result);
extract($row);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>แก้ไขข้อมูลนักศึกษา</title>
  <link rel="stylesheet" href="../../../styles_edit.css">
  <style>
    .heading {
      color: #000;
      margin-left: 10px;
      text-decoration: none;
    }
  </style>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
    }

    input[readonly] {
      background-color: #f0f0f0;
      color: #888;
    }

    .btn-cancel {
      background-color: #FF0000;
      color: white;
      margin-left: 10px;
      padding: 10px 20px;
      border: none;
      border-radius: 10px;
    }

    a {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <?php
  include('../../../components/navbar.php');
  ?>
  <h3><a class="heading" href="admin_home.php">หน้าหลัก</a> » <a class="heading"
      href="admin_student_list.php">ข้อมูลนักศึกษา</a> » แก้ไขข้อมูลนักศึกษา</h3>
  <div class="container">
    <div class="row">
      <form name="edit" action="../../../database/admin/admin_student_db/admin_student_list_edit_db.php"
        method="POST" enctype="multipart/form-data" class="form-horizontal">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <div class="form-group">
          <div class="col-sm-9">
            <p> รหัสนักศึกษา </p>
            <input type="text" name="id" class="form-control" required placeholder="id"
              value="<?php echo $s_id; ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อ </p>
            <input type="text" name="name" class="form-control" required placeholder="name"
              value="<?php echo $s_name; ?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <p> นามสกุล </p>
            <input type="text" name="surname" class="form-control" required placeholder="surname"
              value="<?php echo $s_surname; ?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <label for="gender"> เพศ </label><br><br>
            <select name="gender" class="form-control-second" id="s_gender">
              <option value="ชาย" <?php if ($s_gender == 'ชาย') echo 'selected'; ?>> ชาย </option>
              <option value="หญิง" <?php if ($s_gender == 'หญิง') echo 'selected'; ?>> หญิง </option>
            </select>

          </div>
        </div>
    </div>
    <div class="form-group">
      <div class="col-sm-9">
        <label for="course"> หลักสูตร </label><br><br>
        <select name="course" class="form-control-second" id="s_course">
          <option value="วิทยาการคอมพิวเตอร์"
            <?php if ($s_course == 'วิทยาการคอมพิวเตอร์') echo 'selected'; ?>> วิทยาการคอมพิวเตอร์ </option>
          <option value="เทคโนโลยีสารสนเทศและการสื่อสาร"
            <?php if ($s_course == 'เทคโนโลยีสารสนเทศและการสื่อสาร') echo 'selected'; ?>>
            เทคโนโลยีสารสนเทศและการสื่อสาร </option>
          <option value="คณิตศาสตร์" <?php if ($s_course == 'คณิตศาสตร์') echo 'selected'; ?>> คณิตศาสตร์
          </option>
          <option value="สถิติ" <?php if ($s_course == 'สถิติ') echo 'selected'; ?>> สถิติ </option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-9">
        <p> รหัสอาจารย์ที่ปรึกษา </p>
        <input type="text" name="t_id" class="form-control" required placeholder="teacherid"
          value="<?php echo $t_id; ?>">
      </div>
    </div>


    <div class="btn-first">
      <div class="form-group-1">
        <?php
        echo "<br>";
        echo "<button><a onclick=\"return confirm('ต้องการแก้ไขหรือไม่?')\" class='btn btn-danger btn-xs'>บันทึก</a></button> ";
        echo "<a class='btn btn-cancel' href='admin_student_list.php'>ยกเลิก</a>";
        ?>
      </div>
    </div>
    </form>
  </div>
  </div>
</body>

</html>