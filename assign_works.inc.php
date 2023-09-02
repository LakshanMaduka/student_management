<?php 
include_once './includes/dbh.inc.php';
if(isset($_POST['submit']) ){
    
    $subject = $_POST["subject"];
    $grade = $_POST["grade"];
    $class = $_POST["class"];
    $work = $_POST["works"];
    $lastdate = $_POST['lastdate'];

    $sql = "INSERT INTO works (subject,grade,class,works,lastdate) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../courese_form.php?error=stmtfaild");
        $_SESSION['status_reg']  = "Can't Registerd!";
     $_SESSION['state_code_reg']="error";
        exit();
    }else{
     mysqli_stmt_bind_param($stmt,"sssss",$subject,$grade,$class,$work,$lastdate);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
     $_SESSION['status_reg']  = "Successfully Registerd!";
     $_SESSION['state_code_reg']="success";
     
     header("Location:./main.php");
     exit();
    }
    
}

?>