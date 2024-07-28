<!DOCTYPE html>
<html>
<head>
<style>.heading {color: #000; margin-left: 10px ;text-decoration: none;}</style>
    <style>
        body {
            margin: 0;
            background-color: #f8f9fa;
        }
        .container {
            text-align: center;
            margin-top: 20px;
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 40px;
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
            width: 35%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 20px;
            background-color: #6ce1e97e;
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
            padding: 10px 30px;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php include('navbar.php'); ?>
    <h3><a class="heading" href="student_home.php">หน้าหลัก</a> »<a class="heading" href="student_info.php">ข้อมูลส่วนตัว</a> » แก้ไขข้อมูลส่วนตัว</h3>
    <?php
    include('condb.php');
    $id = $_REQUEST["ID"];
    $sql = "SELECT * FROM student WHERE s_id='$id' ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        extract($row);
    } else {
        echo "No data found for the given ID.";
    }
    ?>
    <br><br>
    <div class="container">
        <div class="row">
            <form name="edit" action="student_edit_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <p1>ชื่อ :</p1>
                    <input type="text" name="s_name" value="<?php echo $s_name; ?>">
                    <br><br>
                    <p2>นามสกุล :</p2>
                    <input type="text" name="s_surname" value="<?php echo $s_surname; ?>">
                    <br><br>
                    <br><br>
                    <input type="submit" value="บันทึก" name="update">
                    <a href="student_info.php" class="btn btn-cancel">ยกเลิก</a>
            </form> 
        </div>
    </div>
</body>
</html>
