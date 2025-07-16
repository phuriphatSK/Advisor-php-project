<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบอาจารย์ที่ปรึกษา</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        form {
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 30%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 20px;
            background-color: #6ce1e97e;
        }

        .h1 {
            text-align: center;
        }

        .container {
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        .navbar {
            background-color: #0099CC;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        .navbar h3 {
            margin: 0;
            color: white;
            text-align: left;
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

        a {
            text-decoration: none
        }

        .btn-cancel {
            background-color: #FF0000;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 25px;
            margin-left: 30px;

        }
    </style>
</head>

<body>
    <nav>
        <div class="navbar">
            <h3>ระบบอาจารย์ที่ปรึกษา</h3>
        </div>
    </nav>
    <br>

    <div class="container">
        <h1>เปลี่ยนรหัสผ่าน</h1>
        <form action="reset_password.php" method="post">
            <p style="margin-right: 25%;">ชื่อผู้ใช้</p>
            <input type="text" name="username"><br><br>
            <p style="margin-right: 23%;">รหัสผ่านใหม่</p>
            <input type='password' name='new_password'><br><br>
            <p style="margin-right: 21%;">ยืนยันรหัสผ่านใหม่</p>
            <input type='password' name='confirm_password'><br><br>
            <input type="submit" value="ยืนยัน">
            <a href="login.php" class="btn btn-cancel">ยกเลิก</a>
        </form>
    </div>

    <script>
        document.getElementById('logoutBtn').addEventListener('click', function() {
            window.location.href = '../index.php';
        });
    </script>
</body>

</html>