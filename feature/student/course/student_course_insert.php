<!DOCTYPE html>
<html>

<head>
    <style>
        .heading {
            color: #000;
            margin-left: 10px;
            text-decoration: none;
        }
    </style>
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            text-align: center;
            margin-top: 20px;
            color: black;
            font-size: 30px;
            max-width: 700px;
            margin: auto;
            background-color: #fff;
            padding: 60px;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin: 10px;
        }

        .form-group label {
            color: black;
            font-size: 18px;
        }

        .form-control {
            background-color: #87CEEB;
            border: none;
            border-radius: 10px;
            padding: 10px;
            font-size: 16px;
            width: 50%;

            color: black;
            margin: 20px;
        }

        .form-control::placeholder {
            color: black;
        }

        .btn {
            background-color: #00FF66;
            color: black;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-cancel {
            background-color: #FF0000;
            color: white;
            margin-left: 10px;
        }

        a {
            text-decoration: none;

        }
    </style>
</head>

<body>
    <?php include('../../../components/navbar.php'); ?>
    <h3><a class="heading" href="../student_home.php">หน้าหลัก</a> » เพิ่มรายวิชาที่ผ่าน</h3>
    <?php
    echo "<br>";

    echo '<div class="container">';
    echo '<form name="insert" action="../../../database/student_db/student_course_insert_db.php" method="POST" class="form-horizontal">';
    echo '<div class="form-group">';
    echo '<label for="id"><b>รหัสรายวิชา: </b></label>';
    echo '<input type="text" name="id" class="form-control" required placeholder="รหัสวิชา">';
    echo '</div>';

    echo '<div class="form-group">';
    echo '<label for="name"><b>ชื่อรายวิชา: </b></label>';
    echo '<input type="text" name="name" class="form-control" required placeholder="ชื่อวิชา">';
    echo '</div>';

    echo '<div class="form-group">';
    echo '<label for="year-select"><b>ปีการศึกษา: </b></label>';
    echo '<select name="year" id="year-select" class="form-control">';
    echo '<option value="">ปีการศึกษา</option>';
    echo '<option value="1/2564">1/2564</option>';
    echo '<option value="2/2564">2/2564</option>';
    echo '<option value="1/2565">1/2565</option>';
    echo '<option value="2/2565">2/2565</option>';
    echo '<option value="1/2566">1/2566</option>';
    echo '<option value="2/2566">2/2566</option>';
    echo '</select>';
    echo '</div>';

    echo '<div class="form-group">';
    echo '<label for="grade-select"><b>เกรด: </b></label>';
    echo '<select name="grade" id="grade-select" class="form-control">';
    echo '<option value="">เกรด</option>';
    echo '<option value="A">A</option>';
    echo '<option value="B+">B+</option>';
    echo '<option value="B">B</option>';
    echo '<option value="C+">C+</option>';
    echo '<option value="C">C</option>';
    echo '<option value="D+">D+</option>';
    echo '<option value="D">D</option>';
    echo '</select>';
    echo '</div>';

    echo '<button type="submit" class="btn" name="btninsert">บันทึก</button>';
    echo '<a href="student_home.php" class="btn btn-cancel">ยกเลิก</a>';
    echo '</form>';
    echo '</div>';
    ?>
</body>

</html>