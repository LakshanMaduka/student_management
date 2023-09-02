<?php
include_once 'dbh.inc.php';

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

// identify empty login inputs
function emptyInputsLogin($username,$pwd){
    $result;
    if(empty($username)||empty($pwd)){
        $result =true;
    }else{
        $result= false;
    }
    return $result;
}

// admin idenification
function adminExits($conn,$username){
    $sql = "SELECT * FROM admin WHERE name = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header('Location:../public/index.php?error =stmtfailed');
        exit();
    }
   else{
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
   
   }
   mysqli_stmt_close($stmt);
}

function loginUser($conn,$username,$pwd){
$admimExit =  adminExits($conn,$username);
if($admimExit === false){
    header("location: ./index.php?error=wronglogin");
    exit();
}
$pwdCheck = $admimExit['password'];
if($pwdCheck !== $pwd){
    echo $pwd;
    echo $pwdCheck;
    header('location: ./index.php?error=wrongUser');
    exit();
}
else if($pwdCheck === $pwd){
session_start();
$_SESSION["adminName"] = $admimExit["name"];
$_SESSION["adminPwd"] = $admimExit["password"];
header("Location: main.php");
exit();
}
}

function studentExits($conn,$username){
    $sql = "SELECT * FROM student WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header('Location:../public/index.php?error =stmtfailed');
        exit();
    }
   else{
    echo " sucess";
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
   
   }
   mysqli_stmt_close($stmt);
}
function loginStudent($conn,$username,$pwd){
    $studentExit =  studentExits($conn,$username);
    if($studentExit === false){
        header("location: ./student_login.php?error=wronglogin");
        exit();
    }
    
    $pwdCheck = $studentExit['password'];
    $checkPwd = password_verify($pwd,$pwdCheck);
    
    if($checkPwd === false){
        echo $pwd;
        echo $pwdCheck;
        header('location: ./student_login.php?error='.$pwdCheck);
        exit();
    }
    else if($checkPwd === true){
   
    $_SESSION["stuName"] = $studentExit['iname'];
    $_SESSION["grade"] = $studentExit['grade'];
    $_SESSION["class"] = $studentExit['class'];
    
    header("Location: student_main.php");
    exit();
    }
    }

function emptyStudentForm($fname,$iname,$email,$nic,$sid,$mobile,$address,$city,$province){
$result;
if(empty($fname)||empty($iname)||empty($email)||empty($nic)||empty($sid)||empty($mobile)||empty($address)||empty($city)||empty($province)){
$result = true;

}else{
    $result = false;
}
return $result;
}
function invalidEmail($email){
    $result;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function registerStudent($conn,$fname,$iname,$email,$nic,$sid,$mobile,$address,$city,$province,$password){
    $sql = "INSERT INTO student (fname,iname,email,nic,sid,mobile,address,city,province,password) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_init($con)){
        header("Location:../student_form.php?error=stmtFaild");
        exit();
    }

}
function generatePassword(){
    $passwordLength = 6;

// Generate a random password
$charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
$password = '';
$charsetLength = strlen($charset);

for ($i = 0; $i < $passwordLength; $i++) {
    $randomIndex = random_int(0, $charsetLength - 1);
    $password .= $charset[$randomIndex];
}
return $password;

}


function sendEmail($email,$username, $password,$emailApi){
   
  
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'apikey';                     //SMTP username
    $mail->Password   = $emailApi;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('lmaduka712@gmail.com', 'Lakshan');
    $mail->addAddress($email, $username);     //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
   //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Registration';
    $mail->Body    = 'This is your password: '.$password;


    $mail->send();
    echo 'Message has been sent';


} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
function hashPassword($password){
$hashPw = password_hash($password,PASSWORD_DEFAULT);
return $hashPw;
}

function createStudent($conn,$fname,$iname,$email,$grade,$sid,$mobile,$address,$city,$class,$password,$adminImage){
$sql = "INSERT INTO student (fname,iname,email,grade,sid,mobile,address,city,class,password,imgUrl) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../student_form.php?error=stmtfaild");
    $_SESSION['status_reg']  = "Can't Registerd!";
 $_SESSION['state_code_reg']="error";
    exit();
}else{
 mysqli_stmt_bind_param($stmt,"sssssisssss",$fname,$iname,$email,$grade,$sid,$mobile,$address,$city,$class,$password,$adminImage);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt);
 $_SESSION['status_reg']  = "Successfully Registerd!";
 $_SESSION['state_code_reg']="success";
 
 header("Location:../hotelResevation/main.php");
 exit();
}
}

function retrieveData($conn){
    $row;
    $query ="SELECT * FROM student";
    $result_set = mysqli_query($conn,$query);
    if($result_set){
        while($result_set){
            $row = mysqli_fetch_assoc($result_set);
        }
    } 
    return $row;
}

function updateStudent(){
    
}