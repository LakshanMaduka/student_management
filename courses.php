
<?php
   
   require_once 'includes/dbh.inc.php';
   $query ="SELECT * FROM classes";
   $result = mysqli_query($conn,$query);
  
   
   ?> 
<!DOCTYPE html>
<html>
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
    <div class="absolute w-full bg-blue-500  h-full"></div>
    <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl   max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
     
        <div class="flex flex-wrap justify-center mt-4">
          <div class="w-6/12 sm:w-4/12 px-4 m-4">
            <img src="https://www.creative-tim.com/learning-lab/tailwind-starter-kit/img/team-2-800x800.jpg" alt="..." class="shadow rounded-full max-w-full h-auto align-middle border-none" />
            <div class="text-center my-1">Admin</div>
          </div>
        </div>
      
   
      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent   " />
   
      <div class="items-center block w-auto max-h-screen overflow-auto h-auto grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
          <li class="mt-0.5 w-full">
            <a class="py-2.7   text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4   transition-colors" href="./main.php">
              <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <svg fill="none"  class="text-blue-500" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125z"></path>
                   </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
            </a>
          </li>


         
          
          <li class="mt-0.5 w-full ">
          <a class="py-2.7    text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4  transition-colors " href="./table.php">
            
              <div class="mr-2 flex h-10 w-10 items-center  justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                
                <svg class="fill-none text-emerald-500" fill = "none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Students</span>
            </a>
          </li>
   
          <li class="mt-0.5 w-full">
            <a class="   py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 rounded-lg font-semibold text-slate-700 transition-colors bg-blue-500/13" href="./courses.php">
              <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <svg class=" fill-none text-red-500" fill = "none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z"></path>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Classes</span>
            </a>
          </li>
   
   
          <li class="mt-0.5 w-full">
            <a class="   py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./teachers.php">
              <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                
                <svg fill="none" class="text-cyan-500" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Teachers</span>
            </a>
          </li>
   
          <li class="mt-0.5 w-full">
            <a class="   py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./reports.php">
              <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <svg fill="none" class="text-red-600" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"></path>
                </svg>
              
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Reports</span>
            </a>
          </li>
   
          <li class="mt-0.5 w-full">
            <a class="   py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./logout.php">
              <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <svg fill="none" class ="text-slate-700" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
     <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9"></path>
   </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">LogOut</span>
            </a>
          </li>
   
   
    </aside>
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
              <nav>
                <!-- breadcrumb -->
                <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                  <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;">Pages</a>
                  </li>
                  <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Courses</li>
                </ol>
                <h6 class="mb-0 font-bold text-white capitalize">Courses</h6>
              </nav>
    
              <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                <div class="flex items-center md:ml-auto md:pr-4">
                  <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                    <span class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                      <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300   bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Type here..." />
                  </div>
                </div>
                
              </div>
            </div>
          </nav>
          <div class="w-full px-6 py-6 mx-auto">

            <div class="flex flex-wrap -mx-3  items-center justify-center">
                  <!-- card1 -->
      <!-- <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 ">
      <a href="./student_form.php">
        <div class="relative flex flex-col  h-50 min-w-0 bg-green-500 hover:bg-white hover:text-emerald-500 hover:outline-emerald-800 shadow-xl  rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3 items-center justify-center">
            <div class="flex-none w-2/3 max-w-full px-3 flex items-center justify-center">
              <div>
                <div class="mr-2 flex h-13 w-13 flex-row items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                
                <h1 class="text-6xl"> 6</h1>
                <p class="text-6xl">-</p>
                <h1 class="text-6xl"> A</h1>
                
              </div>
            </div>
           
          </div>
        </div>
      </div></a>
    </div> -->
    <!-- card1 -->
    <?php 
        while($row = mysqli_fetch_assoc($result)){

        ?>
        <a href = "courese_form.php?grade=<?php echo $row['Grade']?>&class=<?php echo $row['Class_Name']?>">
    <div class="h-40 mx-6 mx-6 w-80 bg-green-500 hover:bg-white hover:text-emerald-500 rounded-2xl flex flex-row -mx-3 items-center justify-center">
    <div class="mr-2 flex h-13 w-13 flex-row items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                
                <h1 class="text-6xl"> <?php echo $row['Grade']; ?></h1>
                <p class="text-6xl">-</p>
                <h1 class="text-6xl"> <?php echo $row['Class_Name']; ?></h1>
                
              </div>

    </div>
    </a>

    <?php }  
    
    ?>
   
    
    <!-- card1 -->
 
        
     
      
          
    </main>

    <!-- card
    <div class="relative flex w-96 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
        <div class="p-6">
          <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
            UI/UX Review Check
          </h5>
          <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
            The place is close to Barceloneta Beach and bus stop just 2 min by walk
            and near to "Naviglio" where you can enjoy the main night life in
            Barcelona.
          </p>
        </div>
        <div class="p-6 pt-0">
          <button
            class="select-none rounded-lg bg-pink-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            type="button"
            data-ripple-light="true"
          >
            Read More
          </button>
        </div>
      </div> -->


<!-- <div class="grid mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12 md:grid-cols-2">
    <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700">
        <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Very easy this was to integrate</h3>
            <p class="my-4">If you care for your time, I hands down would go with this."</p>
        </blockquote>
        <figcaption class="flex items-center justify-center space-x-3">
            <img class="rounded-full w-9 h-9" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/karen-nelson.png" alt="profile picture">
            <div class="space-y-0.5 font-medium dark:text-white text-left">
                <div>Bonnie Green</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Developer at Open AI</div>
            </div>
        </figcaption>    
    </figure>
    <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-tr-lg dark:bg-gray-800 dark:border-gray-700">
        <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Solid foundation for any project</h3>
            <p class="my-4">Designing with Figma components that can be easily translated to the utility classes of Tailwind CSS is a huge timesaver!"</p>
        </blockquote>
        <figcaption class="flex items-center justify-center space-x-3">
            <img class="rounded-full w-9 h-9" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png" alt="profile picture">
            <div class="space-y-0.5 font-medium dark:text-white text-left">
                <div>Roberta Casas</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Lead designer at Dropbox</div>
            </div>
        </figcaption>    
    </figure>
    <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-bl-lg md:border-b-0 md:border-r dark:bg-gray-800 dark:border-gray-700">
        <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Mindblowing workflow</h3>
            <p class="my-4">Aesthetically, the well designed components are beautiful and will undoubtedly level up your next application."</p>
        </blockquote>
        <figcaption class="flex items-center justify-center space-x-3">
            <img class="rounded-full w-9 h-9" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="profile picture">
            <div class="space-y-0.5 font-medium dark:text-white text-left">
                <div>Jese Leos</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Software Engineer at Facebook</div>
            </div>
        </figcaption>    
    </figure>
    <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-gray-200 rounded-b-lg md:rounded-br-lg dark:bg-gray-800 dark:border-gray-700">
        <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Efficient Collaborating</h3>
            <p class="my-4">You have many examples that can be used to create a fast prototype for your team."</p>
        </blockquote>
        <figcaption class="flex items-center justify-center space-x-3">
            <img class="rounded-full w-9 h-9" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png" alt="profile picture">
            <div class="space-y-0.5 font-medium dark:text-white text-left">
                <div>Joseph McFall</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">CTO at Google</div>
            </div>
        </figcaption>    
    </figure>
</div> -->

</body>
</html>