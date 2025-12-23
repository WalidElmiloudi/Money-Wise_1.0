<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MONEYWISE-FINANCE TRACKER | HOME PAGE </title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
</head>

<body class="w-full h-screen bg-slate-100 font-['open_sans'] overflow-hidden">
  <header class="fixed w-full flex items-center justify-between px-2 py-2 xl:-mt-10 xl:px-4">
    <img class="w-20 h-20 xl:w-40 xl:h-40" src="../assets/img/Gemini_Generated_Image_9xkb4f9xkb4f9xkb.webp" alt="MONEYWISE logo">
    <button id="openLoginModal"
      class="text-white text-lg bg-green-500 font-bold px-2 py-1 rounded-md cursor-pointer xl:text-2xl">Login</button>
  </header>
  <section class="w-full h-screen flex flex-col justify-center items-center xl:flex-row xl:px-15 px-2 gap-6  ">
    <img class="xl:order-2 xl:w-200 xl:h-200 xl:-ml-60 xl:-mr-20 -mb-20 -mt-20 2xl:w-250 2xl:h-250 2xl:-mr-50" src="../assets/img/Gemini_Generated_Image_9xkb4f9xkb4f9xkb.webp" alt="MONEYWISE logo">
    <div class="xl:order-1 flex flex-col items-center xl:items-start gap-5 xl:gap-8">
      <p class="text-center text-3xl font-bold text-[#021c3b] xl:text-start xl:text-6xl 2xl:text-7xl">Visualize your money flow and stick to your budget with
        simple, powerful tracking.</p>
      <button id="openSignupModal"
        class="bg-blue-500 text-xl px-2 py-1 rounded-md text-white font-bold cursor-pointer xl:text-4xl xl:py-4 xl:px-4 2xl:text-5xl">Get Started</button>
    </div>
  </section>
  <section id="loginModal"
    class="overlay fixed w-full h-full bg-black/20 backdrop-blur-xs top-0 hidden justify-center items-center"
    aria-hidden="true">
    <div class="w-80 h-100 xl:w-120 xl:h-140 bg-slate-100 rounded-md flex justify-center items-center flex-col gap-4 xl:gap-8">
      <h1 class="text-green-600 font-bold text-2xl xl:text-4xl">LOGIN</h1>
      <form action="../controllers/login.php" method="post" class="flex flex-col justify-center items-center gap-2 xl:gap-4">
        <input class="text-xl py-1 pl-1 pr-5 bg-white rounded-md text-[#021c3b] xl:text-3xl xl:py-3 xl:pl-3 xl:pr-15" type="email" name="email"
          placeholder="Email" required>
        <input class="text-xl py-1 pl-1 pr-5 bg-white rounded-md text-[#021c3b] xl:text-3xl xl:py-3 xl:pl-3 xl:pr-15" type="password" name="password"
          placeholder="Password" required>
        <button type="submit"
          class="py-1 px-2 bg-green-500 text-white text-xl font-bold rounded-md cursor-pointer xl:text-3xl">LOGIN</button>
      </form>
      <div class="flex justify-center items-center">
        <hr class="w-20 border xl:w-40">
        <p class="text-xl font-bold xl:text-3xl">OR</p>
        <hr class="w-20 border xl:w-40">
      </div>
      <button id="signupRedirect"
        class="py-1 px-2 bg-blue-500 text-white text-xl font-bold rounded-md cursor-pointer xl:text-3xl">SIGN UP</button>
    </div>
  </section>
  <section id="signupModal"
    class="overlay fixed w-full h-full bg-black/20 backdrop-blur-xs top-0 hidden justify-center items-center"
    aria-hidden="true">
    <div class="w-80 h-100 xl:w-120 xl:h-140 bg-slate-100 rounded-md flex justify-center items-center flex-col gap-4 xl:gap-8">
      <h1 class="text-blue-600 font-bold text-2xl xl:text-4xl">SIGN UP</h1>
      <form action="../controllers/register.php" method="post" class="flex flex-col justify-center items-center gap-2 xl:gap-4">
        <div class="flex justify-center items-center gap-2.5">
          <input class="text-lg py-1 pl-1 w-30 bg-white rounded-md text-[#021c3b] xl:text-xl xl:py-3 xl:pl-3 xl:w-50" type="text" name="firstname"
            placeholder="First Name" required title="Please no digits or special caracteres">
          <input class="text-lg py-1 pl-1 w-30 bg-white rounded-md text-[#021c3b] xl:text-xl xl:py-3 xl:pl-3 xl:w-50" type="text" name="lastname"
            placeholder="Last Name" required title="Please no digits or special caracteres">
        </div>
        <input class="text-xl py-1 pl-1 pr-5 bg-white rounded-md text-[#021c3b] xl:text-3xl xl:py-3 xl:pl-3 xl:pr-15" type="email" name="email"
          placeholder="Email" required title="example@domain.ex">
        <input class="text-xl py-1 pl-1 pr-5 bg-white rounded-md text-[#021c3b] xl:text-3xl xl:py-3 xl:pl-3 xl:pr-15" type="password" name="password"
          placeholder="Password" required title="At least 8 caracteres with no white space">
        <button type="submit" class="py-1 px-2 bg-blue-500 text-white text-xl font-bold rounded-md cursor-pointer xl:text-3xl">SIGN
          UP</button>
      </form>
      <div class="flex justify-center items-center">
        <hr class="w-20 border xl:w-40">
        <p class="text-xl font-bold xl:text-3xl">OR</p>
        <hr class="w-20 border xl:w-40">
      </div>
      <button id="loginRedirect"
        class="py-1 px-2 bg-green-500 text-white text-xl font-bold rounded-md cursor-pointer xl:text-3xl">LOGIN</button>
    </div>
  </section>
  <script src="../assets/script.js"></script>
</body>

</html>