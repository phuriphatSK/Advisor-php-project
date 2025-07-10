<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="../../../styles.css">
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
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 60px;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin: 10px;
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

        input[type="submit"] {
            background-color: #33FF99;
            color: black;
            padding: 10px 35px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="text"] {
            width: 30%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 20px;
            background-color: #6ce1e97e;
        }

        .form-control::placeholder {
            color: black;
        }

        .form-control-second {
            width: 30%;
            padding: 10px;
            background-color: #6ce1e97e;
            border: 1px solid #ccc;
            border-radius: 20px;
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
            padding: 10px 30px;
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
    <h3><a class="heading" href="../teacher_home.php">หน้าหลัก</a> »<a class="heading"
            href="../info/teacher_info.php">ข้อมูลส่วนตัว</a> » แก้ไขข้อมูลส่วนตัว</h3>
    <?php
    include('../../../database/condb.php');
    $id = $_REQUEST["ID"];
    $sql = "SELECT * FROM teacher WHERE t_id='$id' ";
    $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        extract($row);
    } else {
        echo "No data found for the given ID.";
    }
    ?>
    <br>
    <div class="container">
        <div class="row">
            <form name="edit" action="../../../database/teacher_db/teacher_edit_db.php" method="POST"
                enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                ชื่อ: <input type="text" name="t_name" value="<?php echo $t_name; ?>">
                <input type="hidden" name="t_id" value="<?php echo $t_id; ?>">
                <br><br>
                นามสกุล:
                <input type="text" name="t_surname" value="<?php echo $t_surname; ?>">
                <br><br>
                <div class="form-group">
                    <div class="col-sm-9">
                        <label for="rank">ตำแหน่งทางวิชาการ:</label>
                        <select name="t_rank" class="form-control-second" id="t_rank">
                            <option value="ศาสตราจารย์" <?php if ($t_rank == 'ศาสตราจารย์') echo 'selected'; ?>>
                                ศาสตราจารย์</option>
                            <option value="รองศาสตราจารย์" <?php if ($t_rank == 'รองศาสตราจารย์') echo 'selected'; ?>>
                                รองศาสตราจารย์</option>
                            <option value="ผู้ช่วยศาสตราจารย์"
                                <?php if ($t_rank == 'ผู้ช่วยศาสตราจารย์') echo 'selected'; ?>>ผู้ช่วยศาสตราจารย์
                            </option>
                            <option value="อาจารย์" <?php if ($t_rank == 'อาจารย์') echo 'selected'; ?>>อาจารย์</option>
                        </select>
                    </div>
                </div>

                <br><br>
                <input type="submit" value="บันทึก" name="update">
                <a href="../info/teacher_info.php" class="btn btn-cancel">ยกเลิก</a>
            </form>
        </div>
    </div>
</body>

</html>