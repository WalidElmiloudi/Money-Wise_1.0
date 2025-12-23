<?php
require '../configs/config.php';
session_start();
if(!isset($_SESSION['userId'])){
  header("Location: index.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MONEYWISE-FINANCE TRACKER | HOME PAGE</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
</head>

<body class="w-full h-screen flex flex-col bg-slate-100 font-['open_sans']">
  <header class=" w-full justify-between px-3 h-15 flex items-center xl:hidden">
    <i id="menuBg" class="fi fi-br-menu-burger text-3xl text-[#021c3b]"></i>
    <div class="w-8 h-8 border-2 border-[#021c3b] flex justify-center items-center rounded-full">
      <a href="account.php"><i class="fi fi-sc-user text-xl text-[#021c3b]"></i></a>
    </div>
  </header>
  <section id="home" class="grid w-full h-full px-5 xl:px-2 grid-rows-8 xl:grid-cols-8 2xl:grid-cols-12 gap-2 xl:gap-4">
    <div class="xl:order-1 hidden xl:flex row-span-8 col-span-2 2xl:col-span-2 bg-white">
       <div class="hidden w-[30%] bg-white h-full xl:flex flex-col justify-center gap-20 pl-10">
      <h1 class=" text-4xl font-bold text-white bg-gray-800 rounded-full py-2 px-4 w-fit "><a href="#">Home</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="dashboard.php">Dashboard</a></h1>
        <h1 class=" text-4xl font-bold  py-2 px-4 w-fit  hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="incomes.php">Incomes</a></h1>
        <h1 class=" text-4xl font-bold  py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="expences.php">Expences</a></h1>
    </div>
    </div>
    <div
      class="xl:order-2 row-span-1 rounded-md bg-white shadow-md flex justify-center items-center xl:row-span-3 xl:col-span-4 2xl:col-span-7">
      <p class="text-3xl font-bold text-[#021c3b] 2xl:text-5xl">Welcome <?php echo $_SESSION['username']; ?> !</p>
    </div>
    <div
      class="xl:order-4 row-span-3 rounded-md bg-white shadow-md flex justify-center items-center xl:row-span-5 xl:col-span-4 2xl:col-span-7">
      <div class="w-80 h-60 xl:w-[90%] xl:h-[85%] bg-slate-50">
        <canvas class="w-full h-full">

        </canvas>
      </div>
    </div>
    <div
      class="xl:order-3 row-span-4 rounded-md bg-white shadow-md flex flex-col justify-center items-center gap-5 xl:row-span-8 xl:col-span-2 2xl:col-span-3">
      <h1 class="text-2xl font-bold text-[#021c3b] 2xl:text-4xl">History</h1>
      <div class="w-[80%] h-[80%] xl:w-[85%] bg-slate-50">
      </div>
    </div>
  </section>
  <section id="menu"
    class="fixed w-full h-full overlay bg-black/20 backdrop-filter backdrop-blur-xs shadow-lg hidden flex-col"
    aria-hidden="true">
    <div class="w-[80%] h-screen bg-white pt-3">
      <div class="w-full flex justify-end pr-3">
        <i id="closeMenu" class="fi fi-br-cross text-3xl text-[#021c3b]"></i>
      </div>
      <div class="w-full h-full flex flex-col justify-center gap-20 pl-10 -mt-5">
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="dashboard.php">Dashboard</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="incomes.php">Incomes</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="expences.php">Expences</a></h1>
      </div>
    </div>
  </section>
  <script src="../assets/script.js"></script>
</body>

</html>
