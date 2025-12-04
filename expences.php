<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MONEYWISE-FINANCE TRACKER | EXPENCES PAGE</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-chubby/css/uicons-regular-chubby.css'>
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
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="dashboard.php">Dashboard</a></h1>
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="incomes.php">Incomes</a></h1>
        <h1 class="text-4xl font-bold text-[#041368]"><a href="#">Expences</a></h1>
      </div>
    </div>
  </section>
  <main id="expences" class="w-full h-full flex flex-col xl:flex-row  gap-4" aria-hidden="true">
    <div class="hidden w-[30%] bg-slate-300 h-full xl:flex flex-col justify-center gap-20 pl-10">
      <h1 class=" text-4xl font-bold text-[#041368]"><a href="home.php">Home</a></h1>
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="dashboard.php">Dashboard</a></h1>
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="incomes.php">Incomes</a></h1>
        <h1 class=" text-4xl font-bold text-[#041368]"><a href="#">Expences</a></h1>
      <h1 class=" text-4xl font-bold text-[#041368]"><a href="account.php">Account</a></h1>
    </div>
    <div class="w-full h-full xl:py-1 overflow-hidden">
      <h1 class="text-4xl font-bold text-[#041368] pl-5 xl:hidden">Expences</h1>
      <div class="w-full h-full flex flex-col items-center gap-4">
        <div class="w-90 h-160 xl:h-[90%] xl:w-[80%] bg-slate-100 rounded-md xl:order-2 flex flex-col items-center py-2 gap-2 overflow-scroll [scrollbar-width:none]">
   <?php

       $host     = "localhost";
       $user     = "root";
       $password = "";
       $db       = "smart_wallet";

       $conn   = new mysqli($host, $user, $password, $db);
       $id     = 0;
       $result = $conn->query("SELECT * FROM expences");
       if ($result->num_rows > 0) {
           while ($expence = $result->fetch_assoc()) {
               $id = $expence['id'];
           ?>
<div class="w-[90%] h-20 bg-white rounded-md flex flex-row justify-between px-1">
    <div class="h-full flex flex-col justify-center items-start px-2">
        <h1 class="text-[#041368] text-2xl font-bold"><?php echo $expence['montant'] ?>$</h1>
        <h2 class="text-[#041368] text-xl"><?php echo $expence['date'] ?></h2>
    </div>

    <div class="flex flex-col justify-center h-full gap-1">
        <button id="btn" onclick="deleteModal(<?php echo $id ?>,'expences')"
            class="bg-red-500 py-1 px-2 text-white font-bold text-xl rounded-md cursor-pointer">
            <i class="fi fi-rc-trash"></i>
        </button>

        <button onclick="editModal(<?php echo $id ?>,<?php echo $expence['montant'] ?>,'<?php echo $expence['description'] ?>','expences')" class="bg-green-500 py-1 px-2 text-white font-bold text-xl rounded-md cursor-pointer">
            <i class="fi fi-sc-pencil"></i>
        </button>
    </div>
</div>

                 <?php }
                     }
                 ?>
        </div>
        <button id="addExpenceBtn" class="px-2 py-1 text-white font-bold text-xl bg-red-500 rounded-md xl:order-1 xl:text-2xl cursor-pointer">Add an
          expence</button>
      </div>
    </div>
    <section id="expenceAddModal"
      class="overlay fixed w-full h-full bg-black/20 backdrop-filter backdrop-blur-xs hidden justify-center items-center"
      aria-hidden="true">
      <div
        class="w-[80%] h-[60%] xl:w-[50%] 2xl:w-[40%] bg-slate-100 rounded-md shadow-xl flex items-center justify-center relative">
        <form class="flex flex-col w-full h-full items-center justify-center gap-3 2xl:gap-5" action="expenceHandler.php" method="post">
          <label for="amount" class="text-xl font-bold text-[#041368] self-start pl-8 xl:pl-16 2xl:pl-20">Amount
            :</label>
          <input class="py-2 pl-2 w-[80%] bg-white rounded-md" type="number" name="amount" id="amount" step="0.01"
            title="ex : x.xx">
          <label for="category"
            class="text-xl font-bold text-[#041368] self-start pl-8 xl:pl-16 2xl:pl-20">Category</label>
          <select class="py-2 pl-2 w-[80%] bg-white rounded-md" name="category" id="category">
            <option value="Housing"
              title="Rent or mortgage payments, property taxes, and homeowner's or renter's insurance.">Housing</option>
            <option value="Utilities" title="Electricity, water, gas, internet, and phone bills.">Utilities</option>
            <option value="Food" title="Groceries and meals prepared at home.">Food</option>
            <option value="Transportation"
              title="Car payments, fuel, public transit passes, maintenance, insurance, and parking fees.">
              Transportation
            </option>
            <option value="Healthcare"
              title="Insurance premiums, out-of-pocket medical costs, prescriptions, and dental care.">Healthcare
            </option>
            <option value="Debt Payments" title="Student loans, credit card payments, and other loans.">Debt Payments
            </option>
            <option value="Personal Care" title="Toiletries, haircuts, and grooming services.">Personal Care</option>
            <option value="Clothing" title="New apparel and shoes.">Clothing</option>
            <option value="Entertainment and Recreation" title="Streaming services, hobbies, movies, or dining out.">
              Entertainment and Recreation</option>
            <option value="Family and Pet Care" title="Childcare, pet food, and veterinary costs.">Family and Pet Care
            </option>
            <option value="Miscellaneous" title="Gifts, travel, household supplies, and other irregular costs.">
              Miscellaneous</option>
            <option value="Other" title="Other causes of expence">Other</option>
          </select>
          <label for="description"
            class="text-xl font-bold text-[#041368] self-start pl-8 xl:pl-16 2xl:pl-20">Description
            : </label>
          <textarea class="py-1 pl-2 w-[80%] h-40 bg-white resize-none rounded-md" name="description"
            id="description"></textarea>
          <button type="submit" class="py-1 px-2 bg-red-600 text-white rounded-md xl:text-xl font-bold cursor-pointer">ADD</button>
        </form>
        <button id="closeExpenceModal"
          class="w-10 h-10 bg-red-500 text-white text-xl font-bold rounded-full absolute -top-2 -right-2 xl:text-2xl cursor-pointer">X</button>
      </div>
    </section>
  </main>
  <script src="script.js"></script>
</body>
</html>