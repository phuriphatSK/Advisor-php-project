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
        p {
            margin-right: 25%;
        }

        form {
            text-align: center;
        }

        input[type="text"], input[type="password"] {
            width: 30%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 20px;
            background-color: #6ce1e97e;
        }

        a {
            color: #0099CC;
            margin-left: 25%;
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
            background-color: #0099CC;
            color: white;
            padding: 10px 35px;
            border: none;
            border-radius: 25px; 
            cursor: pointer; 
            font-size: 16px; 
        }
    </style>
</head>
<body>
    <nav>
    <div class="navbar">
        <h3 >ระบบอาจารย์ที่ปรึกษา</h3>
    </div>
    </nav>
    <br>

    <div class="container">
        <h1>เข้าสู่ระบบ</h1>
        <br>
        <form action="process_login.php" method="post">
            <p> ชื่อผู้ใช้ </p>
            <input type="text" name="username"><br><br>
            <p> รหัสผ่าน</p>
            <input type="password" name="password"><br><br>
            <a style="text-decoration:none" href="forgot_password.php">ลืมรหัสผ่าน?</a><br><br>
            <input type="submit" value="เข้าสู่ระบบ">
        </form>
    </div>
</body>
</html>
