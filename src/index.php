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

    $isAdmin = isset($_SESSION['email']) && str_ends_with($_SESSION['email'], '.admin');

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Home page</title>
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
                    <li class="font-semibold text-gray-600 md:mr-12 hover:text-rose-600"><a href="booking.php">Booking</a></li>
                    <li class="font-semibold text-gray-600 md:mr-12 hover:text-rose-600"><a href="https://www.instagram.com/_lqtae.tt/">Contact us</a></li>
                    <?php if (isset($_SESSION['username']) && isset($_SESSION['email']) && str_ends_with($_SESSION['email'], '.admin')): ?>
                        <li class="font-semibold text-gray-600 md:mr-12 hover:text-rose-600"><a href="admin_dashboard.php">Dashboard</a></li>
                    <?php endif; ?>
                    <li class="font-semibold text-gray-600 md:mr-12 hover:text-rose-600">
                        <?php if (isset($_SESSION['username'])): ?>
                            <a href="index.php?logout='1'">
                                <button class="px-6 rounded-3xl border-2 border-blue-400 bg-blue-400 text-white py-1 hover:bg-transparent hover:text-blue-400 font-semibold uppercase">Logout</button>
                            </a>
                        <?php else: ?>
                            <a href="login.php">
                                <button class="px-6 rounded-3xl border-2 border-blue-400 bg-blue-400 text-white py-1 hover:bg-transparent hover:text-blue-400 font-semibold uppercase">Login</button>
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="bg-rose-100 h-screen relative flex flex-col">
            <img src="./img/background.png" alt="Background" class="object-cover w-screen h-4/5">
            <div class="absolute top-2/4 left-1/2 transform -translate-x-1/2 w-11/12 md:w-4/5 bg-white rounded-xl shadow-lg p-4 flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">                    <div class="flex flex-col flex-1">
                        <label class="text-gray-500 text-sm font-semibold mb-2">ชื่อเมือง สถานที่ รีสอร์ท หรือ โรงแรม</label>
                        <div class="flex items-center space-x-2 bg-gray-100 rounded-lg px-4 py-2">
                            <i class="fas fa-map-marker-alt text-blue-500"></i>
                            <input type="text" placeholder="เมือง, อพาร์ตเมนต์, วิลลา หรือสถานที่" class="flex-1 bg-transparent outline-none text-gray-700 placeholder-gray-400">
                        </div>
                    </div>
                    <div class="flex flex-col flex-1">
                        <label class="text-gray-500 text-sm font-semibold mb-2">วันเช็คอินและเช็คเอาต์</label>
                        <div class="flex items-center space-x-2 bg-gray-100 rounded-lg px-4 py-2">
                            <i class="fas fa-calendar-alt text-blue-500"></i>
                            <input type="text" placeholder="24 พ.ย. 2024 - 25 พ.ย. 2024" class="flex-1 bg-transparent outline-none text-gray-700 placeholder-gray-400">
                        </div>
                    </div>
                    <div class="flex flex-col flex-1">
                        <label class="text-gray-500 text-sm font-semibold mb-2">ผู้เข้าพักและห้องพัก</label>
                        <div class="flex items-center space-x-2 bg-gray-100 rounded-lg px-4 py-2">
                            <i class="fas fa-user text-blue-500"></i>
                            <input type="text" placeholder="1 ผู้ใหญ่, 0 เด็ก, 1 ห้อง" class="flex-1 bg-transparent outline-none text-gray-700 placeholder-gray-400">
                        </div>
                    </div>
                    <button type="submit" class="px-6 rounded-3xl border-2  border-orange-600 bg-orange-600 text-white py-1 hover:bg-transparent hover:text-orange-600">
                            <i class="fas fa-search"></i>
                    </button>
    </div>
            </div>
</div>

    </div>
</body>
</html>