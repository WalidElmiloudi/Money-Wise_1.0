<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MONEYWISE-FINANCE TRACKER | DASHBOARD PAGE</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
</head>

<body class="w-full h-screen flex flex-col bg-slate-200 font-['open_sans']">
  <header class=" w-full justify-between px-3 h-15 flex items-center xl:hidden">
    <i id="menuBg" class="fi fi-br-menu-burger text-3xl text-[#041368]"></i>
    <div class="w-8 h-8 border-2 border-[#041368] flex justify-center items-center rounded-full">
     <a href="account.php"><i class="fi fi-sc-user text-xl text-[#041368]"></i></a>
    </div>
  </header>
  <section id="menu"
    class="fixed w-full h-full overlay bg-black/20 backdrop-filter backdrop-blur-xs shadow-lg hidden flex-col"
    aria-hidden="true">
    <div class="w-[80%] h-screen bg-slate-400 pt-3">
      <div class="w-full flex justify-end pr-3">
        <i id="closeMenu" class="fi fi-br-cross text-3xl text-[#041368]"></i>
      </div>
      <div class="w-full h-full flex flex-col justify-center gap-20 pl-10 -mt-5">
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="home.php">Home</a></h1>
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="#">Dashboard</a></h1>
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="incomes.php">Incomes</a></h1>
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="expences.php">Expences</a></h1>
      </div>
    </div>
  </section>
  <main id="dashboard" class="w-full h-full flex flex-col gap-2" aria-hidden="true">
    <h1 class="text-4xl font-bold text-[#041368] pl-2 xl:hidden">Dashboard</h1>
    <div class="w-full h-full grid grid-cols-2 xl:grid-cols-14 grid-rows-8 gap-2 px-2">
      <div class="xl:order-1 hidden xl:flex col-span-3 row-span-8 bg-slate-300 shadow-md rounded-md">
        <div class="w-full h-full flex flex-col justify-center gap-20 pl-10 -mt-5">
          <h1 class=" text-4xl font-bold text-[#041368]"><a href="home.php">Home</a></h1>
          <h1 class=" text-4xl font-bold text-[#041368]"><a href="#">Dashboard</a></h1>
          <h1 class=" text-4xl font-bold text-[#041368]"><a href="incomes.php">Incomes</a></h1>
          <h1 class=" text-4xl font-bold text-[#041368]"><a href="expences.php">Expences</a></h1>
          <h1 class="text-4xl font-bold text-[#041368]"><a href="account.php">Account</a></h1>
        </div>
      </div>
      <div class="xl:order-2 col-span-1 xl:col-span-4 xl:row-span-2 row-span-2 bg-slate-300 shadow-md rounded-md"></div>
      <div class="xl:order-3 col-span-1 row-span-2 xl:col-span-4 xl:row-span-2 bg-slate-300 shadow-md rounded-md"></div>
      <div class="xl:order-5 col-span-2 xl:row-span-6 xl:col-span-8 row-span-2 bg-slate-300 shadow-md rounded-md"></div>
      <div class="xl:order-4 col-span-2 xl:col-span-3 xl:row-span-8 row-span-4 bg-slate-300 shadow-md rounded-md"></div>
    </div>
  </main>
  <script src="script.js"></script>
</body>