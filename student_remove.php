<?php
include_once './includes/dbh.inc.php';
session_start();
$id = $_GET['id'];
$query = "DELETE FROM student WHERE sid = '$id'";
$data =  mysqli_query($conn,$query);

if($data){
    $_SESSION['status']  = "Do you want to delete this?";
    $_SESSION['state_code']="warning";
    header("Location:./table.php");


}
else {
    $_SESSION['status']  = "Student not removed successfully";
    $_SESSION['state_code']="error";
    header("Location:./table.php");
}

?>
