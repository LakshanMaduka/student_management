


<?php

include_once './includes/dbh.inc.php';
include_once './includes/functions.inc.php';
// error_reporting(0);
// ini_set('display_errors', 0);


// Assuming you have already established a database connection
$fid=$_GET["id"];


$row;

// Use prepared statement to avoid SQL injection
$stmt = $conn->prepare("SELECT * FROM student WHERE sid = ? LIMIT 1");
$stmt->bind_param("s", $fid);
$stmt->execute();

$result = $stmt->get_result();

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $result->free_result();
    } else {
        echo "Student not found.";
    }
} else {
    echo "Error: " . $conn->error;
}





if(isset($_POST['submit']) ){
  
  $fname = $_POST["fname"];
  $iname = $_POST["iname"];
  $email = $_POST["email"];
  $grade = $_POST["grade"];
  $gid = $_POST['fid'];
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
          $uploadDirectory = './images';
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
  }else{
   $adminImage = $row['imgUrl'];
  }
  
  
  

  



  $query = "UPDATE student SET fname=?, iname=?, email=?, grade=?, class=?, address=?, city=?, mobile=?, imgUrl=? WHERE sid=?";
$stmt = mysqli_prepare($conn, $query);

// Check if the statement was prepared successfully
if (!$stmt) {
    die("Error in preparing statement: " . mysqli_error($conn));
}


// Bind parameters to the statement
mysqli_stmt_bind_param($stmt, "sssssssiss", $fname, $iname, $email, $grade, $class, $address, $city, $mobile, $adminImage, $gid);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
  header('Location: successfulUpdate.php');
    // You can redirect the user to a success page here if needed
} else {
    echo "Update failed: " . mysqli_stmt_error($stmt);
    // Log the error for further investigation
}
  
  
  
  
  
  
  
  // $_SERVER['PHP_SELF'];
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.png" /> -->
        <title>Table</title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Nucleo Icons -->
        <!-- <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> -->
        <link rel="stylesheet" href = "style.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Popper -->
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <!-- Main Styling -->
        <!-- <link href="../assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" /> -->
      </head>
<body>
 
    <div class="h-full bg-blue-500">
    <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
              <li class="text-sm leading-normal">
                <a class="text-white opacity-50" href="javascript:;">Pages</a>
              </li>
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Students</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Update Student</h6>
          </nav>

          <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
              <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                <a href="./main.php"><button class="bg-white text-blue-500 active:bg-gray-300 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button" name="student_form_submit">
                    Back
                      </button>
                    </a>
                
              </div>
            </div>
           
          </div>
        </div>
      </nav>

<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">


<section class=" py-1 bg-blue-500">
<div class="w-full lg:w-8/12 px-4 mx-auto mt-6 ">
  <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-2xl bg-blueGray-100 border-0 ">
    <div class="rounded-tl-2xl rounded-tr-2xl  mb-0 px-6 py-6">
      
    </div>
    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
      <form action="./student_update_form.php" method = "post" enctype="multipart/form-data">
      <div class="text-center flex justify-between">
        <h6 class="text-blueGray-700 text-xl font-bold">
          Update Student
        </h6>
       
        <input type="hidden" name="fid" value="<?php echo $fid; ?>">
        <button name="submit" class="bg-blue-500 text-white active:bg-sky-700 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="submit">
          Update
        </button>
        
      </div>
        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
        Update  Student Information
        </h6>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Full Name
              </label>
              <input type="text" value='<?php echo $row['fname'];?>' name="fname" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" >
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Name With Initials
              </label>
              <input type="text" value="<?php echo $row['iname'];?>" name="iname" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" >
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Email
              </label>
              <input type="email" name="email" value="<?php echo $row['email'];?>" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" >
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Grade
              </label>
              <input type="text" value="<?php echo $row['grade'];?>" name="grade" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" >
            </div>
          </div>
        </div>
       <div class="flex flex-wrap">
        <div class="w-full lg:w-6/12 px-4">
          <div class="relative w-full mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
              Class
            </label>
            <input type="text" name="class" value="<?php echo $row['class'];?>" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" >
          </div>
        </div>
      
    
       </div>

        <hr class="mt-6 border-b-1 border-blueGray-300">

        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
          Contact Information
        </h6>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Address
              </label>
              <input type="text" name="address" value="<?php echo $row['address'];?>" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" >
            </div>
          </div>
          <div class="w-full lg:w-4/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                City
              </label>
              <input type="text" name="city" value="<?php echo $row['city'];?>" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" >
            </div>
            
          </div>
          <div class="w-full lg:w-6/12 px-4">
          <div class="relative w-full mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
              Mobile_number
            </label>
            <input type="text" name="mobile" value="<?php echo $row['mobile'];?>" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" >
          </div>
        </div>
          
         
        </div>

        <hr class="mt-6 border-b-1 border-blueGray-300">

        <div>
            <label class="block text-sm font-medium text-blueGray-600">
            IMAGE
          </label>
          <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
          <div class="mb-3">
					
					<input type="file" class="form-control" name="adminPic" id="adminPic" value = <?php echo $row['imgUrl'];?>>
          <p><?php echo $row['imgUrl'];?></p>
				</div>
          </div>
        </div>
      </form>
    </div>
  </div>
  
</div>
</section>
  

</div>

</body>
</html>

