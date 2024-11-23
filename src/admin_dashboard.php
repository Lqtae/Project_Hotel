<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100">
    <div class="shadow mb-2 bg-white">
        <div class="relative flex flex-col overflow-hidden px-4 py-4 md:mx-auto md:flex-row md:items-center">
            <a href="index.php" class="flex items-center whitespace-nowrap text-2xl font-black">
                <span class="text-black">Hotel.com</span>
            </a>
            <input type="checkbox" class="peer hidden" id="navbar-open" />
            <label class="absolute top-5 right-7 cursor-pointer md:hidden" for="navbar-open">
                <span class="sr-only">Toggle Navigation</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </label>
            <nav aria-label="Main Navigation" class="peer-checked:mt-8 peer-checked:max-h-56 flex max-h-0 w-full flex-col items-center justify-between overflow-hidden transition-all md:ml-24 md:max-h-full md:flex-row md:items-start">
                <ul class="flex flex-col items-center space-y-2 md:ml-auto md:flex-row md:space-y-0">
                    <li class="font-semibold text-gray-600 md:mr-12 hover:text-rose-600"><a href="index.php">Home</a></li>
                    <li class="font-semibold text-gray-600 md:mr-12 hover:text-rose-600"><a href="#">Booking</a></li>
                    <li class="font-semibold text-gray-600 md:mr-12 hover:text-rose-600"><a href="https://www.instagram.com/_lqtae.tt/">Contract us</a></li>
                    <li class="font-semibold text-gray-600 md:mr-12 hover:text-rose-600">
                        <?php if (isset($_SESSION['username'])): ?>
                            <a href="index.php?logout='1'">
                                <button class="px-6 rounded-3xl border-2 border-rose-600 bg-rose-600 text-white py-1 hover:bg-transparent hover:text-rose-600 font-semibold">Logout</button>
                            </a>
                        <?php else: ?>
                            <a href="login.php">
                                <button class="px-6 rounded-3xl border-2 border-rose-600 bg-rose-600 text-white py-1 hover:bg-transparent hover:text-rose-600 font-semibold">Login</button>
                            </a>
                        <?php endif ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="h-screen bg-cover bg-center ">
        <img src="./img/background.png" alt="" class="">
    </div>

    
</body>
</html>