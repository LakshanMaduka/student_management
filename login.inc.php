<?php
include_once './includes/dbh.inc.php';
include_once './includes/functions.inc.php';

if(isset($_POST['submit'])){
$username = $_POST["uid"];
$pwd = $_POST["pwd"];


if(emptyInputsLogin($username,$pwd) !== false){
    exit();
}
loginUser($conn,$username,$pwd);


}else{
    header('Location: index.php');
    exit();
}
?>