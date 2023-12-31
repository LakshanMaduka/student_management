
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href = "./public/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="border-0">
<section class = "bg-white min-h-screen flex items-center justify-center">
    <div class ="bg-[#B1D7E7]  flex rounded-2xl overflow-hidden shadow-lg max-w-6xl p-5">
        <div class = "md:w-1/2 px-10 mt-1 flex justify-center items-center h-auto ">
      <div class="w-10/12">
        <h2 class ="font-bold text-4xl text-[#07085B] ">Login Admin</h2>
        
       <!-- form -->
        <form action ="./login.inc.php" method="post" class="flex flex-col gap-4">
         <input type="text"  placeholder="Email" class="p-2 mt-7  rounded-xl border" name="uid">
         <div class="relative">
             <input type="password"  placeholder="Password" class="p-2 rounded-xl border w-full" name="pwd">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2 "  viewBox="0 0 16 16">
                 <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                 <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
               </svg>
         </div>
         <button type="submit" name = "submit" class="bg-[#07085B] rounded-xl text-white py-2 hover:scale-105 duration-300">LogIn</button>
        </form>
        <div class="mt-4 text-xs flex justify-between items-center">
            
            <p class="text-[#5C789B]">Login As a Student</p>
           <a href="./student_login.php"> <button class="py-2 px-2 bg-white border rounded-xl text-[#5C789B] border-gray-200 hover:scale-110 duration-300">Student</button></a>
        </div>
      </div>
       <!-- devider1 -->
       <!-- <div class="mt-10 grid grid-cols-3 items-center text-gray-400">
        <hr  class="border-gray-400">
        <p class="text-center text-sm">OR</p>
        <hr class="border-gray-400"> -->
       
        </div>
       <!-- googlrbutton -->
        <!-- <button class="bg-white border border-gray-200 py-2 w-full hover:scale-105 duration-300 rounded-xl mt-5 flex justify-center items-center text-sm text-[#5C789B]"><svg  class="mr-4" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" preserveAspectRatio="xMidYMid" viewBox="0 0 256 262" id="google"><path fill="#4285F4" d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"></path><path fill="#34A853" d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"></path><path fill="#FBBC05" d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"></path><path fill="#EB4335" d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"></path></svg>Login with Google</button> -->
        <!-- bottomItem -->
        <!-- <hr class="border-gray-400 mt-6">
        <div class="mt-4 text-xs flex justify-between items-center">
            
            <p class="text-[#5C789B]">If you dont have an account?</p>
            <button class="py-2 px-2 bg-white border rounded-xl text-[#5C789B] border-gray-200 hover:scale-110 duration-300">Register</button>
        </div>
        </div > -->
       

        
        <div class = "w-1/2 rounded-2xl overflow-hidden " >
            <img src="./public/images/login.jpg" alt="" class="md:block hidden"> 
        </div>
        


    </div>
</section>

</body>

</html>
