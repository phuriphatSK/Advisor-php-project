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
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f8f9fa;
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

    input[readonly] {
        background-color: #f0f0f0;
        color: #888;
    }
    </style>
</head>

<body>
    <?php
    include('../../../components/navbar.php');
    session_start();
    include('../../../database/condb.php');
    $id = $_REQUEST["ID"];
    $username = $_SESSION['username'];

    $sql = "SELECT r.c_id, c.c_name, r.r_year, r.r_grade FROM record r, course c WHERE r.c_id = c.c_id AND r.c_id = '$id' AND r.s_id = '$username' ";
    $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        extract($row);
    } else {
        echo "No data found for the given ID.";
    }
    ?>

    <h3><a class="heading" href="../student_home.php">หน้าหลัก</a> »<a class="heading"
            href="student_course.php">รายวิชาที่ผ่าน</a> » แก้ไขข้อมูล</h3>

    <div class="container">
        <form name="insert" action="../../../database/student_db/student_course_edit_db.php" method="POST"
            class="form-horizontal">
            <div class="form-group">
                <label for="id"><b>รหัสรายวิชา: </b></label>
                <input type="text" name="id" value="<?php echo $c_id; ?>" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="name"><b>ชื่อรายวิชา: </b></label>
                <input type="text" name="name" value="<?php echo $c_name; ?>" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="year-select"><b>ปีการศึกษา: </b></label>
                <select name="year" id="year-select" class="form-control">
                    <option value="1/2564" <?php if ($r_year == '1/2564') echo 'selected'; ?>>1/2564</option>
                    <option value="2/2564" <?php if ($r_year == '2/2564') echo 'selected'; ?>>2/2564</option>
                    <option value="1/2565" <?php if ($r_year == '1/2565') echo 'selected'; ?>>1/2565</option>
                    <option value="2/2565" <?php if ($r_year == '2/2565') echo 'selected'; ?>>2/2565</option>
                    <option value="1/2566" <?php if ($r_year == '1/2566') echo 'selected'; ?>>1/2566</option>
                    <option value="2/2566" <?php if ($r_year == '2/2566') echo 'selected'; ?>>2/2566</option>
                </select>
            </div>

            <div class="form-group">
                <label for="grade-select"><b>เกรด: </b></label>
                <select name="grade" id="grade-select" class="form-control">
                    <option value="A" <?php if ($r_grade == 'A') echo 'selected'; ?>>A</option>
                    <option value="B+" <?php if ($r_grade == 'B+') echo 'selected'; ?>>B+</option>
                    <option value="B" <?php if ($r_grade == 'B') echo 'selected'; ?>>B</option>
                    <option value="C+" <?php if ($r_grade == 'C+') echo 'selected'; ?>>C+</option>
                    <option value="C" <?php if ($r_grade == 'C') echo 'selected'; ?>>C</option>
                    '<option value="D+" <?php if ($r_grade == 'D+') echo 'selected'; ?>>D+</option>
                    <option value="D" <?php if ($r_grade == 'D') echo 'selected'; ?>>D</option>
                </select>
            </div>

            <button type="submit" class="btn" name="btninsert">บันทึก</button>
            <a href="student_course.php" class="btn btn-cancel">ยกเลิก</a>
        </form>
    </div>
</body>

</html>