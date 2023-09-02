<?php
include_once './includes/dbh.inc.php';
include_once './includes/functions.inc.php';
require_once './vendor/autoload.php';

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);

$dotenv -> load();
$emailApi = $_ENV['EMAIL_API'];


if(isset($_POST['submit']) ){
    
$fname = $_POST["fname"];
$iname = $_POST["iname"];
$email = $_POST["email"];
$grade = $_POST["grade"];
$sid = $_POST["sid"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];
$city = $_POST["city"];
$class = $_POST["class"];
$adminImage = null;
if(isset($_FILES['adminPic']) && $_FILES['adminPic']['error'] == 0){
    
    // User has uploaded an image
    $allowedTypes = array('jpg', 'jpeg', 'png');
    $fileType = pathinfo($_FILES['adminPic']['name'], PATHINFO_EXTENSION);

    if (in_array($fileType, $allowedTypes)) {
        $fileName = time() . '_' . uniqid() . '_' . $_FILES['adminPic']['name'];
        $tempName = $_FILES['adminPic']['tmp_name'];
        $fileSize = $_FILES['adminPic']['size'];
        $uploadDirectory = 'public/images';
        $uploadPath = $uploadDirectory . $fileName;

        if (move_uploaded_file($tempName, $uploadPath)) {
            // Image has been successfully uploaded
            echo("Success");
            $adminImage = $uploadPath;
        } else {
           echo('unsucsess');
            // Error uploading the image
            // header("Location:student_form.php?showModal=true&status=unsuccess&message=Error uploading image");
            exit();
        }
    } else {
        echo('unsucsess type');
        // Unsupported file type
        // header("Location:student_form.php?showModal=true&status=unsuccess&message=Unsupported file type");
        exit();
    }
}




if(emptyStudentForm($fname,$iname,$email,$grade,$sid,$mobile,$address,$city,$class) !== false){
    exit();
}


$password = generatePassword();
sendEmail($email,$fname,$password,$emailApi);
$hashPassword = hashPassword($password);
createStudent($conn,$fname,$iname,$email,$grade,$sid,$mobile,$address,$city,$class,$hashPassword,$adminImage);


}else{
    echo('unsucsess tttt');
    header('Location:./student_form.php?error1');
    exit();
}
?>