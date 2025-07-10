<?php
include('conndb.php');

$id = $_POST["id"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$gender = $_POST["gender"];
$rank = $_POST["rank"];
$course = $_POST["course"];
$username = $_POST["t_username"];

$sql = "UPDATE teacher SET 
        t_name='$name',
        t_surname='$surname',
        t_gender='$gender',
        t_rank='$rank',
        t_course='$course',
        t_username='$username'
        WHERE t_id='$id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
mysqli_close($con);

if($result){
    echo "<script type='text/javascript'>";
    echo "alert('Update Successful');";
    echo "window.location = 'teacher_list.php'; ";
    echo "</script>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('Error. Please try updating again.');";
    echo "window.location = 'teacher_list.php'; ";
    echo "</script>";
}
?>
