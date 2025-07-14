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

    input[type="text"],
    input[type="password"] {
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
        color: white;
    }

    .navbar h3 {
        margin: 0;
    }

    .navbar button {
        background-color: transparent;
        border: 2px solid white;
        border-radius: 5px;
        padding: 8px 15px;
    }

    .navbar button:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .navbar a {
        color: white;
        text-decoration: none;
        margin: 0;
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
            <h3>ระบบอาจารย์ที่ปรึกษา</h3>
            <button><a href="/advisor-g5/feature/register/index.php">ลงทะเบียน</a></button>
        </div>
    </nav>
    <br>

    <div class="container">
        <h1>เข้าสู่ระบบ</h1>
        <br>
        <form action="/advisor-g5/feature/login/components/process_login.php" method="post"
            style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
            <p> ชื่อผู้ใช้ </p>
            <input type="text" name="username" required>
            <p> รหัสผ่าน</p>
            <input type="password" name="password" required>
            <a style="text-decoration:none" href="forgot_password.php">ลืมรหัสผ่าน?</a>
            <input type="submit" value="เข้าสู่ระบบ" required>
        </form>
    </div>
</body>

</html>