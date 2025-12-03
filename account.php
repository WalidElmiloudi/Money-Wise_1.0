<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MONEYWISE-FINANCE TRACKER | ACCOUNT PAGE</title>
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
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="dashboard.php">Dashboard</a></h1>
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="incomes.php">Incomes</a></h1>
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="expences.php">Expences</a></h1>
      </div>
    </div>
  </section>
  <main id="account" class="w-full h-full flex flex-col xl:flex-row gap-4 items-center" aria-hidden="true">
    <div class="hidden w-[30%] bg-slate-300 h-full xl:flex flex-col justify-center gap-20 pl-10">
      <h1 class=" text-4xl font-bold text-[#041368]"><a href="home.php">Home</a></h1>
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="dashboard.php">Dashboard</a></h1>
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="incomes.php">Incomes</a></h1>
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="expences.php">Expences</a></h1>
      <h1 class=" text-4xl font-bold text-[#041368]"><a href="#">Account</a></h1>
    </div>
    <div class="w-full h-full xl:py-1 flex flex-col items-center gap-3">
      <h1 class="text-4xl font-bold text-[#041368] pl-5">Account</h1>
      <div class="w-[90%] h-[90%] bg-slate-100 rounded-md">
      </div>
    </div>
  </main>
  <script src="script.js"></script>
</body>