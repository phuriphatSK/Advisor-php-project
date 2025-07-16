<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบอาจารย์ที่ปรึกษา</title>
    <link rel="stylesheet" href="../login/styles/main/index.css">
</head>

<body>
    <nav>
        <div class="navbar">
            <h3>ระบบอาจารย์ที่ปรึกษา</h3>
            <button><a href="/advisor-g5/feature/register/index.php">ลงทะเบียน</a></button>
        </div>
    </nav>

    <div class="container">
        <h1>เข้าสู่ระบบ</h1>
        <form action="/advisor-g5/feature/login/components/process_login.php" method="post">
            <label for="username">ชื่อผู้ใช้</label>
            <input type="text" id="username" name="username" required>

            <label for="password">รหัสผ่าน</label>
            <input type="password" id="password" name="password" required>

            <div class="forgot">
                <a href="../login/components/forgot_password.php">ลืมรหัสผ่าน?</a>
            </div>

            <input type="submit" value="เข้าสู่ระบบ">
        </form>
    </div>
</body>

</html>