<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลนักศึกษา</title>
    <link rel="stylesheet" href="styles_edit.css">
    <style>.heading {color: #000; margin-left: 10px ;text-decoration: none;}</style>
    <style>
      body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }
      .heading {
        color: #000;
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
    include('navbar.php');
?>
<h3><a class="heading" href="admin_home.php">หน้าหลัก</a> » เพิ่มข้อมูลนักศึกษา</a></h3>
<div class="container">
  <div class="row">
      <form  name="edit" action="admin_student_insert_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
      <input type="hidden" name="id" value="<?php echo $id; ?>" />
      <div class="form-group">
          <div class="col-sm-9">
            <p> รหัสนักศึกษา </p>
            <input type="text"  name="id" class="form-control" required placeholder="รหัสนักศึกษา">
          </div>
        </div>
      <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อ </p>
            <input type="text"  name="name" class="form-control" required placeholder="ชื่อ">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <p> นามสกุล </p>
            <input type="text"  name="surname" class="form-control" required placeholder="นามสกุล">
          </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
            <label for="gender" > เพศ </label><br><br>
            <select name="gender" class="form-control-second" id="s_gender">
                <option value="">เลือกเพศ</option>
                <option value="ชาย"> ชาย </option>
                <option value="หญิง"> หญิง </option>
            </select>

            </div>
        </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
            <label for="course" > หลักสูตร </label><br><br>
            <select name="course" class="form-control-second" id="s_course">
                <option value="">เลือกหลักสูตร</option>
                <option value="วิทยาการคอมพิวเตอร์"> วิทยาการคอมพิวเตอร์ </option>
                <option value="เทคโนโลยีสารสนเทศและการสื่อสาร"> เทคโนโลยีสารสนเทศและการสื่อสาร </option>
                <option value="คณิตศาสตร์"> คณิตศาสตร์ </option>
                <option value="สถิติ"> สถิติ </option>
            </select>
            </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <p> รหัสอาจารย์ที่ปรึกษา </p>
            <input type="text"  name="t_id" class="form-control" required placeholder="รหัสอาจารย์ที่ปรึกษา" >
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <p> รหัสผ่าน </p>
            <input type="text"  name="password" class="form-control" required placeholder="รหัสผ่าน">
          </div>
        </div>
        <div class="btn-first">
            <div class="form-group-1">
              <?php
              echo "<br>" ;
              echo "<button><a onclick=\"return confirm('ต้องการเพิ่มหรือไม่?')\" class='btn btn-danger btn-xs'>บันทึก</a></button> ";
              echo "<a class='btn btn-cancel' href='admin_student_list.php'>ยกเลิก</a>";
              ?>
            </div>
        </div>
      </form>
    </div>
  </div>
  </body>
  </html>