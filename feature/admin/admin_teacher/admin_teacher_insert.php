<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลอาจารย์</title>
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
    <h3><a class="heading" href="../admin_home.php">หน้าหลัก</a> » เพิ่มข้อมูลอาจารย์</a></h3>
    <div class="container">
        <div class="row">
            <form name="edit" action="../../../database/admin/admin_teacher_db/admin_teacher_insert_db.php"
                method="POST" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <div class="form-group">
                    <div class="col-sm-9">
                        <p> ชื่อ </p>
                        <input type="text" name="name" class="form-control" required placeholder="ชื่อ">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <p> นามสกุล </p>
                        <input type="text" name="surname" class="form-control" required placeholder="นามสกุล">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <label for="gender"> เพศ </label><br><br>
                        <select name="gender" class="form-control-second" id="t_gender">
                            <option value="">เลือกเพศ</option>
                            <option value="ชาย"> ชาย </option>
                            <option value="หญิง"> หญิง </option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <label for="rank"> ตำแหน่งทางวิชาการ </label><br><br>
                        <select name="rank" class="form-control-second" id="t_rank">
                            <option value="">เลือกตำแหน่งทางวิชาการ</option>
                            <option value="รองศาสตราจารย์"> รองศาสตราจารย์ </option>
                            <option value="ผู้ช่วยศาสตราจารย์"> ผู้ช่วยศาสตราจารย์ </option>
                            <option value="อาจารย์"> อาจารย์ </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <label for="course"> หลักสูตร </label><br><br>
                        <select name="course" class="form-control-second" id="t_course">
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
                        <p> ชื่อผู้ใช้ </p>
                        <input type="text" name="username" class="form-control" required placeholder="ชื่อผู้ใช้">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <p> รหัสผ่าน </p>
                        <input type="text" name="password" class="form-control" required placeholder="รหัสผ่าน">
                    </div>
                </div>
                <div class="btn-first">
                    <div class="form-group-1">
                        <?php
            echo "<br>";
            echo "<button><a onclick=\"return confirm('Do you want edit?')\" class='btn btn-danger btn-xs'> บันทึก </a></button> ";
            echo "<a class='btn btn-cancel' href='admin_teacher_list.php'>ยกเลิก</a>";

            ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>