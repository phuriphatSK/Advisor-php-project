<?php
include('../../../database/condb.php');

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
</head>

<body>
  <h1>หน้าหลัก » ข้อมูลนักศึกษา » แก้ไขข้อมูลนักศึกษา</h1>
  <div class="container">
    <div class="row">
      <form name="edit" action="../../../database/student_db/student_course_edit_db.php" method="POST"
        enctype="multipart/form-data" class="form-horizontal">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <div class="form-group">
          <div class="col-sm-9">
            <p> รหัสนักศึกษา </p>
            <input type="text" name="id" class="form-control" required placeholder="id"
              value="<?php echo $s_id; ?>">
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
        ?>
      </div>
    </div>
    </form>
    <br>
    <div class="btn-cancle">
      <a href="student_list.php">ยกเลิก</a>
    </div>
  </div>
  </div>
</body>

</html>