<?php
include('conndb.php');
$id = $_REQUEST["ID"];
$sql = "SELECT * FROM teacher WHERE t_id='$id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
$row = mysqli_fetch_array($result);
extract($row);

?>
<div class="container">
  <div class="row">
      <form  name="edit" action="teacher_list_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
      <input type="hidden" name="id" value="<?php echo $id; ?>" />
      <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อ </p>
            <input type="text"  name="name" class="form-control" required placeholder="name" value="<?php echo $t_name; ?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <p> นามสกุล </p>
            <input type="text"  name="surname" class="form-control" required placeholder="surname" value="<?php echo $t_surname; ?>">
          </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
            <label for="gender" > เพศ </label><br><br>
            <select name="gender" id="t_gender">
                <option value="ชาย" <?php if ($t_gender == 'ชาย') echo 'selected'; ?>> ชาย </option>
                <option value="หญิง" <?php if ($t_gender == 'หญิง') echo 'selected'; ?>> หญิง </option>
            </select>

            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
            <label for="rank" > ตำแหน่งทางวิชาการ </label><br><br>
            <select name="rank" id="t_rank">
                <option value="รองศาสตราจารย์" <?php if ($t_rank == 'รองศาสตราจารย์') echo 'selected'; ?>> รองศาสตราจารย์ </option>
                <option value="ผู้ช่วยศาสตราจารย์" <?php if ($t_rank == 'ผู้ช่วยศาสตราจารย์') echo 'selected'; ?>> ผู้ช่วยศาสตราจารย์ </option>
                <option value="อาจารย์" <?php if ($t_rank == 'อาจารย์') echo 'selected'; ?>> อาจารย์ </option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
            <label for="course" > หลักสูตร </label><br><br>
            <select name="course" id="t_course">
                <option value="วิทยาการคอมพิวเตอร์" <?php if ($t_course == 'วิทยาการคอมพิวเตอร์') echo 'selected'; ?>> วิทยาการคอมพิวเตอร์ </option>
                <option value="เทคโนโลยีสารสนเทศและการสื่อสาร" <?php if ($t_course == 'เทคโนโลยีสารสนเทศและการสื่อสาร') echo 'selected'; ?>> เทคโนโลยีสารสนเทศและการสื่อสาร </option>
                <option value="คณิตศาสตร์" <?php if ($t_course == 'คณิตศาสตร์') echo 'selected'; ?>> คณิตศาสตร์ </option>
                <option value="สถิติ" <?php if ($t_course == 'สถิติ') echo 'selected'; ?>> สถิติ </option>
            </select>
            </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อผู้ใช้ </p>
            <input type="text"  name="t_username" class="form-control" required placeholder="username" value="<?php echo $t_username; ?>">
          </div>
        </div>
        <div class="form-group">
            <?php
            echo "<br>" ;
            echo "<button><a onclick=\"return confirm('Do you want edit?')\" class='btn btn-danger btn-xs'> Submit </a></button> ";
            ?>
        </div>
    
      </form>
      <a href="teacher_list.php">Back to List</a>
    </div>
  </div>