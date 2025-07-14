<?php
// register.php
include('../../database/condb.php');

// ตรวจสอบว่ามี session เริ่มต้นแล้วหรือไม่
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$id = isset($_REQUEST["ID"]) ? $_REQUEST["ID"] : '';
if (!empty($id)) {
    $sql = "SELECT * FROM student WHERE s_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
    if ($row) {
        extract($row);
    }
}
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบอาจารย์ที่ปรึกษา - ลงทะเบียน</title>
    <link rel="stylesheet" href="../register/styles/index.css">
</head>

<body>
    <nav>
        <div class="navbar">
            <h3>ระบบอาจารย์ที่ปรึกษา</h3>
            <button>
                <a href="/advisor-g5/feature/login/index.php">เข้าสู่ระบบ</a>
            </button>
        </div>
    </nav>

    <div class="container">
        <h1>ลงทะเบียน</h1>

        <form action="process_register.php" method="post" id="registerForm">
            <div class="form-group">
                <label for="role">ตำแหน่ง:</label>
                <select name="role" id="role" class="form-control-select" required>
                    <option value="">เลือกตำแหน่ง</option>
                    <option value="teacher">อาจารย์</option>
                    <option value="student">นักศึกษา</option>
                </select>
            </div>

            <div id="studentFields" style="display: none;">
                <div class="form-group">
                    <label for="student_id">รหัสนักศึกษา:</label>
                    <input type="text" id="student_id" name="student_id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="student_name">ชื่อ:</label>
                    <input type="text" id="student_name" name="student_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="student_surname">นามสกุล:</label>
                    <input type="text" id="student_surname" name="student_surname" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="student_username">ชื่อผู้ใช้:</label>
                    <input type="text" id="student_username" name="student_username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">รหัสผ่าน:</label>
                    <input type="password" id="student_password" name="student_password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">ยืนยันรหัสผ่าน:</label>
                    <input type="password" id="student_confirm_password" name="student_confirm_password"
                        class="form-control" required>
                    <div id="password_error" class="error"></div>
                </div>
                <div class="form-group">
                    <label for="student_course">หลักสูตร:</label>
                    <input type="text" id="student_course" name="student_course" class="form-control">
                </div>
                <div class="form-group">
                    <label for="student_gender">เพศ:</label>
                    <select id="student_gender" name="student_gender" class="form-control-select">
                        <option value="">เลือกเพศ</option>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="student_teacher">อาจารย์ที่ปรึกษา:</label>
                    <select id="student_teacher" name="student_teacher" class="form-control-select">
                        <option value="">เลือกอาจารย์</option>
                        <?php
                        $result = mysqli_query($con, "SELECT t_id, t_name, t_surname FROM teacher");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['t_id'] . "'>" . $row['t_name'] . " " . $row['t_surname'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div id="teacherFields" style="display: none;">
                <div class="form-group">
                    <label for="teacher_name">ชื่อ:</label>
                    <input type="text" id="teacher_name" name="teacher_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="teacher_surname">นามสกุล:</label>
                    <input type="text" id="teacher_surname" name="teacher_surname" class="form-control">
                </div>

                <div class="form-group">
                    <label for="teacher_username">ชื่อผู้ใช้:</label>
                    <input type="text" id="teacher_username" name="teacher_username" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">รหัสผ่าน:</label>
                    <input type="password" id="teacher_password" name="teacher_password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">ยืนยันรหัสผ่าน:</label>
                    <input type="password" id="teacher_confirm_password" name="teacher_confirm_password"
                        class="form-control" required>
                    <div id="password_error" class="error"></div>
                </div>
                <div class="form-group">
                    <label for="teacher_course">หลักสูตร:</label>
                    <input type="text" id="teacher_course" name="teacher_course" class="form-control">
                </div>
                <div class="form-group">
                    <label for="teacher_gender">เพศ:</label>
                    <select id="teacher_gender" name="teacher_gender" class="form-control-select">
                        <option value="">เลือกเพศ</option>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="teacher_position">ตำแหน่ง:</label>
                    <select id="teacher_position" name="teacher_position" class="form-control-select">
                        <option value="">เลือกตำแหน่ง</option>
                        <?php
                        $result = mysqli_query($con, "SELECT t_rank FROM teacher");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['t_rank'] . "'>" . $row['t_rank'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>


            <button type="submit" class="submit-btn">ลงทะเบียน</button>
        </form>

        <div class="login-link">
            <p>มีบัญชีแล้ว? <a href="/advisor-g5/feature/login/index.php">เข้าสู่ระบบ</a></p>
        </div>
    </div>

    <script>
        document.getElementById('role').addEventListener('change', function() {
            const role = this.value;
            const teacherFields = document.getElementById('teacherFields');
            const studentFields = document.getElementById('studentFields');

            // ซ่อน/แสดง
            teacherFields.style.display = role === 'teacher' ? 'block' : 'none';
            studentFields.style.display = role === 'student' ? 'block' : 'none';

            // จัดการ required เฉพาะฟิลด์ที่แสดงอยู่
            [...teacherFields.querySelectorAll("input, select")].forEach(el => {
                el.required = (role === 'teacher');
            });

            [...studentFields.querySelectorAll("input, select")].forEach(el => {
                el.required = (role === 'student');
            });
        });

        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const role = document.getElementById('role').value;
            const errorDiv = document.getElementById('password_error');

            let password = '',
                confirmPassword = '';

            if (role === 'student') {
                password = document.getElementById('student_password').value;
                confirmPassword = document.getElementById('student_confirm_password').value;
            } else if (role === 'teacher') {
                password = document.getElementById('teacher_password').value;
                confirmPassword = document.getElementById('teacher_confirm_password').value;
            }

            if (password.length < 6) {
                e.preventDefault();
                errorDiv.textContent = 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร';
                return false;
            }

            if (password !== confirmPassword) {
                e.preventDefault();
                errorDiv.textContent = 'รหัสผ่านไม่ตรงกัน';
                return false;
            }

            errorDiv.textContent = '';
        });
    </script>
</body>

</html>