<?php
include_once './includes/dbh.inc.php';
include_once './includes/functions.inc.php';


if(isset($_POST['submit']) && isset($_FILES['adminPic'])){
    echo("hello");
    
// $fname = $_POST["fname"];
// $iname = $_POST["iname"];
// $email = $_POST["email"];
// $grade = $_POST["grade"];
// $sid = $_POST["sid"];
// $mobile = $_POST["mobile"];
// $address = $_POST["address"];
// $city = $_POST["city"];
// $class = $_POST["class"];
// $adminImage = null;

//     echo("sumbitted file");
//     // User has uploaded an image
//     $allowedTypes = array('jpg', 'jpeg', 'png');
//     $fileType = pathinfo($_FILES['adminPic']['name'], PATHINFO_EXTENSION);

//     if (in_array($fileType, $allowedTypes)) {
//         $fileName = time() . '_' . uniqid() . '_' . $_FILES['adminPic']['name'];
//         $tempName = $_FILES['adminPic']['tmp_name'];
//         $fileSize = $_FILES['adminPic']['size'];
//         $uploadDirectory = 'images';
//         $uploadPath = $uploadDirectory . $fileName;

//         if (move_uploaded_file($tempName, $uploadPath)) {
//             // Image has been successfully uploaded
//             echo("Success");
//             $adminImage = $uploadPath;
//         } else {
//            echo('unsucsess');
//             // Error uploading the image
//             // header("Location:student_form.php?showModal=true&status=unsuccess&message=Error uploading image");
//             exit();
//         }
//     } else {
//         echo('unsucsess type');
//         // Unsupported file type
//         // header("Location:student_form.php?showModal=true&status=unsuccess&message=Unsupported file type");
//         exit();
//     }



// if(emptyStudentForm($fname,$iname,$email,$grade,$sid,$mobile,$address,$city,$class) !== false){
//     exit();
// }

// echo($adminImage);
// // $password = generatePassword();
// // sendEmail($email,$fname,$password);
// // $hashPassword = hashPassword($password);
// // createStudent($conn,$fname,$iname,$email,$grade,$sid,$mobile,$address,$city,$class,$hashPassword,$adminImage);


}
else{
    echo('unsucsess tttt');
    // header('Location:./student_form.php?error1');
    exit();
}
?>