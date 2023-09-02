<?php
   
   require_once 'includes/dbh.inc.php';
   $query ="SELECT * FROM grade";
   $result = mysqli_query($conn,$query);
  
   
   ?> 

<?php

    $selectedValue = $_POST['selectGrade'];
    
    // Do something with the selected value (e.g., save it to a database, process it, etc.)
    
   

?>

<!DOCTYPE html>
<html>
<head>
    <title>Get Select Value</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css"  rel="stylesheet" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<div class ="w-auto flex ">
<form method = "post" action="./selectGrade.php" class="flex w-full">




<select id="selectGrade" name="selectGrade" onchange = "this.form.submit();" class=" w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 ">
  <option selected>Select Grade</option>
  <?php 
        while($row = mysqli_fetch_assoc($result)){

        ?>
   <option value=<?php echo $row['Grade']; ?>><?php echo $row['Grade']; ?></option>
 <!-- <option value="CA">Canada</option>
  <option value="FR">France</option>
  <option value="DE">Germany</option> -->


  <?php } ?>
</select>
<label for="selectGrade" class="mx-5 w-auto mb-2 text-lg font-medium text-gray-900  flex justify-center items-center"><?php if($selectedValue===null){
    echo "Select Grade";
}else{
    echo $selectedValue;
}

?></label>

</form>
</div>

</body>
</html>
