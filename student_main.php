
<?php session_start() ?>
<?php 
$grade = $_SESSION['grade'];
$class = $_SESSION['class'];
   require_once 'includes/dbh.inc.php';
   $query ="SELECT * FROM works where grade='$grade' AND class='$class'";
   $result = mysqli_query($conn,$query);

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
    <script src="build/assets/js/sweetalert2.all.min.js"></script>
    <script src="build/assets/js/jquery-3.7.0.all.min.js"></script>
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <!-- <link href="../assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" /> -->
  </head>
<body>
<div class="absolute w-full bg-blue-500  h-full">
    <h1 class="text-5xl flex justify-center items-center"> Welcome </h1>
    <h1 class="text-5xl flex justify-center items-center"> <?php echo $_SESSION['stuName'] ?> </h1>
    <?php 
        while($row = mysqli_fetch_assoc($result)){

        ?>

    <div class="h-40 mx-6 mx-6 w-80 bg-white  rounded-2xl ">
        <div class="mr-2 h-13 w-13   rounded-lg  stroke-0  xl:p-2.5 ">
      
                    <h1 class="text-lg mb-5 text-start">subject:        <?php echo $row['subject'] ?> </h1>
                    <h1 class="text-lg my-5 text-start">work:           <?php echo $row['works'] ?></h1>
                    <h1 class="text-lg mt-5 tect-start">due date:         <?php echo $row['lastdate'] ?></h1>
                    
                  </div>
    
        </div>

        <?php } ?>
    </div>
</body>
</html>