<?php
    if(!isset($_SESSION['userID'])){
  header("Location: /Money-Wise_1.0/Home/index");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MONEYWISE-FINANCE TRACKER | INCOMES PAGE</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-chubby/css/uicons-regular-chubby.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
</head>

<body class="w-full h-screen flex flex-col bg-slate-100 font-['open_sans'] text-[#021c3b]">
  <header class=" w-full justify-between px-3 h-15 flex items-center xl:hidden">
    <i id="menuBg" class="fi fi-br-menu-burger text-3xl text-[#021c3b]"></i>
    <div class="w-8 h-8 border-2 border-[#021c3b] flex justify-center items-center rounded-full">
     <a href="account.php"><i class="fi fi-sc-user text-xl text-[#021c3b]"></i></a>
    </div>
  </header>
  <section id="menu"
    class="fixed w-full h-full overlay bg-black/20 backdrop-filter backdrop-blur-xs shadow-lg hidden flex-col"
    aria-hidden="true">
    <div class="w-[80%] h-screen bg-white pt-3">
      <div class="w-full flex justify-end pr-3">
        <i id="closeMenu" class="fi fi-br-cross text-3xl text-[#021c3b]"></i>
      </div>
      <div class="w-full h-full flex flex-col justify-center gap-20 pl-10 -mt-5">
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="home.php">Home</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="dashboard.php">Dashboard</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="expences.php">Expences</a></h1>
      </div>
    </div>
  </section>
  <main class="w-full h-full flex flex-col xl:flex-row gap-4">
    <div class="hidden w-[30%] bg-white h-full xl:flex flex-col justify-center gap-20 pl-10">
      <h1 class=" text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="/Money-Wise_1.0/home/home/">Home</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="/Money-Wise_1.0/dashboard/index">Dashboard</a></h1>
        <h1 class=" text-4xl font-bold rounded-full py-2 px-4 w-fit bg-gray-800 text-white"><a href="#">Incomes</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="/Money-Wise_1.0/expence/index/">Expences</a></h1>
        <h1 class="text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white flex items-center justify-center cursor-pointer"><i class="fi fi-rs-sign-out-alt"></i><a href="../controllers/logout.php">LOGOUT</a></h1>
    </div>
    <div class ="w-full h-full bg-[#f2f4f7] flex justify-center items-center">
       <div class = "w-[90%] h-[90%] bg-white rounded-lg flex flex-col justify-center gap-2 items-center p-4">
        <div class="w-full flex flex-row items-center justify-between xl:px-10">
          <h1 class="text-3xl  xl:text-4xl text-[#021c3b] font-bold self-start">Incomes</h1>
          <div class="relative 2xl:hidden">
            <i id="sortBtn" class="fi fi-br-bars-sort"></i>
            <div id="sort" class="w-30 h-30 bg-gray-200 rounded-md shadow-lg absolute right-0 hidden">
                <form class="h-full flex flex-col justify-around items-center" action="sort.php?target=incomes" method="post">
                  <label for="sort" class="text-base font-bold self-start pl-5">Sort By:</label>
                  <select name="sort" class="bg-white rounded-sm cursor-pointer text-[12px] w-20">
                    <option value="Amount">Amount</option>
                    <option value="Date">Date</option>
                  </select>
                  <button type="submit" class="py-1 px-2 w-10 bg-black text-white font-bold text-xs rounded-md cursor-pointer">Sort</button>
                </form>
            </div>
          </div>
          <div class="w-[60%] hidden 2xl:flex items-center px-10">
            <form class="w-full flex flex-row gap-2 items-center" action="../controllers/sort.php?target=incomes" method="post">
                  <label for="sort" class="text-xl font-bold self-start">Sort By:</label>
                  <select name="sort" class="bg-[#f2f4f7] rounded-sm cursor-pointer text-sm w-30">
                    <option value="Amount">Amount</option>
                    <option value="Date">Date</option>
                  </select>
                  <button type="submit" class="py-1 px-2 bg-black text-white font-bold text-base rounded-md cursor-pointer">Sort</button>
                </form>

            </form>
          </div>
          <div class="relative 2xl:hidden">
              <i id="filterBtn" class="fi fi-rr-filter"></i>
              <div id="filter" class="w-30 h-40 xl:w-50 xl:h-60 bg-gray-200 absolute right-0 rounded-md shadow-lg hidden">
   <form class="h-full flex flex-col gap-2 p-2 xl:justify-around" action="../controllers/filter.php?target=incomes" method = "post">
              <label for="category" class="text-xs font-bold xl:text-lg">Category :</label>
              <select class="bg-white rounded-sm cursor-pointer text-[12px] xl:text-base" name="category" id="categoryFilter">
                <option value="All"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "All" ? "selected" : "");}?>>
                          All</option>
                <option value="Salary"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Salary" ? "selected" : "");}?>
                        title="This is income you earn from a job, where you are paid an hourly rate to complete set tasks. The more hours you work, the more money you earn.">
                          Salary</option>
                <option value="Wages"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Wages" ? "selected" : "");}?>
                        title="Similar to wages, this is money you earn from a job. Your annual salary is usually set out in a contract and paid either weekly, fortnightly or monthly. Usually the amount is regular and you won’t earn more for extra hours worked.">
                          Wages</option>
                <option value="Commission"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Commission" ? "selected" : "");}?>
                        title="Commission is where you earn money for completing a task. This is common in sales roles. You might earn a set amount of money for each sale you make or you might earn a percentage of a sale price for your work. Commission is based on results rather than time worked.">
                          Commission</option>
                <option value="Selling something"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Selling something" ? "selected" : "");}?>
                        title="Maybe you’re handy with a needle and thread or you’re a gifted mathematician. You might have a tonne of stuff you don’t want anymore. Selling things you make, your skills as a service or stuff you own and no longer want are all potential ways to bring in some cash.">
                          Selling something</option>
                <option value="Gifts"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Gifts" ? "selected" : "");}?>
                        title="Who doesn’t love a cash present? Birthdays and Christmas can be a great and sometimes unexpected source of income.">
                          Gifts</option>
                <option value="Allowance"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Allowance" ? "selected" : "");}?>
                        title="Money your grown-ups give you on a regular basis. They may or may not expect you to do jobs in return for the moola.">
                          Allowance</option>
                <option value="Government Payments"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Government Payments" ? "selected" : "");}?>
                        title="Depending on your situation you may be eligible for assistance payments from the government.">
                          Government Payments</option>
                <option value="Other"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Other" ? "selected" : "");}?> title="Other source of income">Other</option>
              </select>
              <label for="date" class="text-xs font-bold xl:text-lg">Date :</label>
              <select class="bg-white rounded-sm cursor-pointer" name="date" id="dateFilter">
                <option value="All"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "All" ? "selected" : "");}?> >All</option>
                <option value="CURMONTH"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "CURMONTH" ? "selected" : "");}?>>This Month</option>
                <option value="LASMONTH"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "LASMONTH" ? "selected" : "");}?>>Last Month</option>
                <option value="CURYEAR"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "CURYEAR" ? "selected" : "");}?>>This Year</option>
                <option value="LASTYEAR"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "LASYEAR" ? "selected" : "");}?>>Last Year</option>
              </select>
              <button type="submit" class="py-1 px-2 text-xs xl:text-base bg-blue-500 text-white font-bold rounded-md cursor-pointer">Apply</button>
            </form>
            <?php
            unset($_SESSION['date'],$_SESSION['category']);
            ?>
              </div>
          </div>
          <div class="hidden 2xl:flex w-full  flex-row items-center justify-end gap-2">
            <h1 class="text-xl font-bold">Filter : </h1>
            <form class="flex items-center gap-2" action="../controllers/filter.php?target=incomes" method = "post">
              <label for="category" class="text-lg font-bold">Category :</label>
              <select class="bg-[#f2f4f7] rounded-md cursor-pointer" name="category" id="categoryFilter">
                <option value="All"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "All" ? "selected" : "");}?>>
                          All</option>
                <option value="Salary"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Salary" ? "selected" : "");}?>
                        title="This is income you earn from a job, where you are paid an hourly rate to complete set tasks. The more hours you work, the more money you earn.">
                          Salary</option>
                <option value="Wages"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Wages" ? "selected" : "");}?>
                        title="Similar to wages, this is money you earn from a job. Your annual salary is usually set out in a contract and paid either weekly, fortnightly or monthly. Usually the amount is regular and you won’t earn more for extra hours worked.">
                          Wages</option>
                <option value="Commission"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Commission" ? "selected" : "");}?>
                        title="Commission is where you earn money for completing a task. This is common in sales roles. You might earn a set amount of money for each sale you make or you might earn a percentage of a sale price for your work. Commission is based on results rather than time worked.">
                          Commission</option>
                <option value="Selling something"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Selling something" ? "selected" : "");}?>
                        title="Maybe you’re handy with a needle and thread or you’re a gifted mathematician. You might have a tonne of stuff you don’t want anymore. Selling things you make, your skills as a service or stuff you own and no longer want are all potential ways to bring in some cash.">
                          Selling something</option>
                <option value="Gifts"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Gifts" ? "selected" : "");}?>
                        title="Who doesn’t love a cash present? Birthdays and Christmas can be a great and sometimes unexpected source of income.">
                          Gifts</option>
                <option value="Allowance"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Allowance" ? "selected" : "");}?>
                        title="Money your grown-ups give you on a regular basis. They may or may not expect you to do jobs in return for the moola.">
                          Allowance</option>
                <option value="Government Payments"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Government Payments" ? "selected" : "");}?>
                        title="Depending on your situation you may be eligible for assistance payments from the government.">
                          Government Payments</option>
                <option value="Other"<?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Other" ? "selected" : "");}?> title="Other source of income">Other</option>
              </select>
              <label for="date" class="text-lg font-bold">Date :</label>
              <select class="bg-[#f2f4f7] rounded-md cursor-pointer" name="date" id="dateFilter">
                <option value="All"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "All" ? "selected" : "");}?> >All</option>
                <option value="CURMONTH"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "CURMONTH" ? "selected" : "");}?>>This Month</option>
                <option value="LASMONTH"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "LASMONTH" ? "selected" : "");}?>>Last Month</option>
                <option value="CURYEAR"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "CURYEAR" ? "selected" : "");}?>>This Year</option>
                <option value="LASTYEAR"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "LASYEAR" ? "selected" : "");}?>>Last Year</option>
              </select>
              <button type="submit" class="py-1 px-2 bg-blue-500 text-white font-bold rounded-md cursor-pointer">Apply</button>
            </form>
          </div>
        </div>

          <div class="w-[90%]  h-[90%] flex flex-col items-center py-2 shadow-lg">
           <div class="w-full grid grid-cols-10 grid-rows-1">
            <div class="col-span-2 border-b border-r text-[8px] 2xl:text-2xl text-center font-bold break-words xl:text-base py-2">Amount</div>
            <div class="col-span-2 border-b border-r text-[8px] 2xl:text-2xl text-center font-bold break-words xl:text-base py-2">Category</div>
            <div class="col-span-2 border-b border-r text-[8px] 2xl:text-2xl text-center font-bold break-words xl:text-base py-2">Description</div>
            <div class="col-span-2 border-b border-r text-[8px] 2xl:text-2xl text-center font-bold break-words xl:text-base py-2">Registiration date</div>
            <div class="col-span-2 border-b text-[8px] 2xl:text-2xl text-center font-bold break-words xl:text-base py-2">Actions</div>
           </div>
           <div class="w-full h-full  overflow-scroll [scrollbar-width:none]">
                     <div class="w-full grid grid-cols-10 grid-rows-1 py-2 px-1 bg-[#f2f4f7]">
                       <?php 
                          //  $id = 0;
                          //  if (isset($_SESSION['filteredArray'])) {
                               foreach ($incomes as $income) {
                               ?>
            <div class="col-span-2 text-green-600  text-[8px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words"><?php echo $income['montant'] ?>$</div>
            <div class="col-span-2  text-[8px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words flex justify-center"><?php echo $income['category'] ?></div>
            <div class="col-span-2  text-[7px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words "><?php echo $income['description'] ?></div>
            <div class="col-span-2  text-[8px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words flex items-center justify-center"><?php echo $income['date'] ?></div>
            <div class="col-span-2  text-start font-bold border-b border-black  p-1 break-words flex justify-center xl:justify-around gap-1">
              <button id="btn" onclick="deleteModal(<?=$income['id'] ?>,'income')"
            class=" text-red-500 font-bold text-[7px] xl:text-base 2xl:text-xl cursor-pointer">
            delete
        </button>
        <button onclick="editModal(<?= $income['id'] ?>,<?= $income['montant'] ?>,'<?= $income['description'] ?>','income','<?= $income['category'] ?>')" class="text-green-500 font-bold text-[7px] xl:text-base 2xl:text-xl  cursor-pointer">
            edit
        </button>
            </div>
            <?php
                    }
                // } else {
                    // $incomes = $object->getAll();
                    //   unset($_SESSION['backup']);
                    //     foreach($incomes as $income) {
                    //       $_SESSION['backup'][]=$income;
                    //         $id = $income['id'];
                        ?>
            <!-- <div class="col-span-2 text-green-600  text-[8px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words"><?php echo $income['montant'] ?>$</div>
            <div class="col-span-2  text-[8px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words flex justify-center"><?php echo $income['category'] ?></div>
            <div class="col-span-2  text-[7px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words "><?php echo $income['description'] ?></div>
            <div class="col-span-2  text-[8px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words flex items-center justify-center"><?php echo $income['date'] ?></div>
            <div class="col-span-2  text-start font-bold border-b border-black  p-1 break-words flex justify-center xl:justify-around gap-1">
              <button id="btn" onclick="deleteModal(<?php// echo $id ?>,'incomes')"
            class=" text-red-500 font-bold text-[7px] xl:text-base 2xl:text-xl cursor-pointer">
            delete
        </button>
        <button onclick="editModal(<?php// echo $id ?>,<?php // echo $income['montant'] ?>,'<?php // echo $income['description'] ?>','incomes','<?php echo $income['category'] ?>')" class="text-green-500 font-bold text-[7px] xl:text-base 2xl:text-xl  cursor-pointer">
            edit
        </button>
            </div> -->
            <?php 
            // }}
                        
              
                // if(isset($_SESSION['filteredArray'])){
                //   $_SESSION['backup'] = $_SESSION['filteredArray'];
                // }
                
                // unset($_SESSION['filteredArray']);;
            ?>
           </div>
          </div>
        </div>
          <button id="addIncome" class="py-1 px-2 text-white font-bold text-xl bg-blue-500 rounded-md xl:order-1 xl:text-2xl cursor-pointer">Add an
          income</button>
       </div>

    </div>
    <section id="incomeAddModal"
      class="overlay fixed w-full h-full bg-black/20 backdrop-filter backdrop-blur-xs hidden justify-center items-center"
      aria-hidden="true">
      <div
        class="w-[80%] h-[60%] xl:w-[50%] 2xl:w-[40%] bg-slate-100 rounded-md shadow-xl flex items-center justify-center relative">
        <form class="flex flex-col w-full h-full items-center justify-center gap-3 2xl:gap-5" action="/Money-Wise_1.0/income/save/" method="post">
          <label for="amount" class="text-xl font-bold text-[#021c3b] self-start pl-8 xl:pl-16 2xl:pl-20">Amount
            :</label>
          <input class="py-2 pl-2 w-[80%] bg-white rounded-md" type="number" name="amount" id="amount" step="0.01"
            title="ex : x.xx">
          <label for="category"
            class="text-xl font-bold text-[#021c3b] self-start pl-8 xl:pl-16 2xl:pl-20">Category</label>
          <select class="py-2 pl-2 w-[80%] bg-white rounded-md" name="category" id="category">
            <option value="Salary"
              title="This is income you earn from a job, where you are paid an hourly rate to complete set tasks. The more hours you work, the more money you earn.">
              Salary</option>
            <option value="Wages"
              title="Similar to wages, this is money you earn from a job. Your annual salary is usually set out in a contract and paid either weekly, fortnightly or monthly. Usually the amount is regular and you won’t earn more for extra hours worked.">
              Wages</option>
            <option value="Commission"
              title="Commission is where you earn money for completing a task. This is common in sales roles. You might earn a set amount of money for each sale you make or you might earn a percentage of a sale price for your work. Commission is based on results rather than time worked.">
              Commission</option>
            <option value="Selling something"
              title="Maybe you’re handy with a needle and thread or you’re a gifted mathematician. You might have a tonne of stuff you don’t want anymore. Selling things you make, your skills as a service or stuff you own and no longer want are all potential ways to bring in some cash.">
              Selling something</option>
            <option value="Gifts"
              title="Who doesn’t love a cash present? Birthdays and Christmas can be a great and sometimes unexpected source of income.">
              Gifts</option>
            <option value="Allowance"
              title="Money your grown-ups give you on a regular basis. They may or may not expect you to do jobs in return for the moola.">
              Allowance</option>
            <option value="Government Payments"
              title="Depending on your situation you may be eligible for assistance payments from the government.">
              Government Payments</option>
            <option value="Other" title="Other source of income">Other</option>
          </select>
          <label for="description"
            class="text-xl font-bold text-[#021c3b] self-start pl-8 xl:pl-16 2xl:pl-20">Description
            : </label>
          <textarea class="py-1 pl-2 w-[80%] h-40 bg-white resize-none rounded-md" name="description"
            id="description"></textarea>
          <button type="submit" class="py-1 px-2 bg-blue-600 text-white font-bold rounded-md xl:text-xl cursor-pointer">ADD</button>
        </form>
        <button id="closeIncomeModal"
          class="w-10 h-10 bg-red-500 text-white text-xl font-bold rounded-full absolute -top-2 -right-2 xl:text-2xl cursor-pointer">X</button>
      </div>
    </section>
  </main>
  <script src="/Money-Wise_1.0/public/assets/script.js"></script>
</body>
</html>