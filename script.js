// DECLARATION OF VARIABLES
const openLoginModal = document.getElementById("openLoginModal");
const openSignupModal = document.getElementById("openSignupModal");
const loginModal = document.getElementById("loginModal");
const signupModal = document.getElementById("signupModal");
const loginRedirect = document.getElementById("loginRedirect");
const signupRedirect = document.getElementById("signupRedirect");
const menuIcon = document.getElementById("menuBg");
const closeMenu = document.getElementById("closeMenu");
const menu = document.getElementById("menu");
const addIncomeBtn = document.getElementById("addIncome");
const incomeModal = document.getElementById("incomeAddModal");
const closeIncomeModal = document.getElementById("closeIncomeModal");
const addExpenceBtn = document.getElementById("addExpenceBtn")
const expenceModal = document.getElementById("expenceAddModal");
const closeExpenceModal = document.getElementById("closeExpenceModal");
const main = document.querySelector("body>main");

if (openLoginModal) {
  openLoginModal.addEventListener("click", () => {
    loginModal.classList.replace("hidden", "flex");
    loginModal.removeAttribute("aria-hidden");
  })
}
if (openSignupModal) {
  openSignupModal.addEventListener("click", () => {
    signupModal.classList.replace("hidden", "flex");
    signupModal.removeAttribute("aria-hidden");
  })
}
document.addEventListener("click", (e) => {
  if (e.target.classList.contains("overlay")) {
    currenttarget = e.target;
    currenttarget.classList.replace("flex", "hidden");
    currenttarget.setAttribute("aria-hidden", "true");
  }
})
if (signupRedirect) {
  signupRedirect.addEventListener("click", () => {
    loginModal.classList.replace("flex", "hidden");
    loginModal.setAttribute("aria-hidden", "true");
    signupModal.classList.replace("hidden", "flex");
    signupModal.removeAttribute("aria-hidden");
  })
}
if (loginRedirect) {
  loginRedirect.addEventListener("click", () => {
    signupModal.classList.replace("flex", "hidden");
    signupModal.setAttribute("aria-hidden", "true");
    loginModal.classList.replace("hidden", "flex");
    loginModal.removeAttribute("aria-hidden");
  })
}
if (menuIcon) {
  menuIcon.addEventListener("click", () => {
    menu.classList.replace("hidden", "flex");
    menu.removeAttribute("aria-hidden");
  })
  closeMenu.addEventListener("click", () => {
    menu.classList.replace("flex", "hidden");
    menu.setAttribute("aria-hidden", "true");
  })
}
if (addIncomeBtn) {
  addIncomeBtn.addEventListener("click", () => {
    incomeModal.classList.replace("hidden", "flex");
    incomeModal.removeAttribute("aria-hidden");
  })
  closeIncomeModal.addEventListener("click", () => {
    incomeModal.classList.replace("flex", "hidden");
    incomeModal.setAttribute("aria-hidden", "true");
  })
}
if (addExpenceBtn) {
  addExpenceBtn.addEventListener("click", () => {
    expenceModal.classList.replace("hidden", "flex");
    expenceModal.removeAttribute("aria-hidden");
  })
  closeExpenceModal.addEventListener("click", () => {
    expenceModal.classList.replace("flex", "hidden");
    expenceModal.setAttribute("aria-hidden", "true");
  })
}

function deleteModal(id,table){
  console.log(id,table);
   const newSection = document.createElement("section");
    newSection.classList.add("fixed", "w-full", "h-full", "bg-black/20", "backdrop-filter", "backdrop-blur-xs", "flex", "justify-center", "items-center");
    newSection.innerHTML = `<div class="w-70 h-50 bg-slate-100 rounded-md flex flex-col items-center justify-center gap-4">
        <p class="text-3xl font-bold text-[#021c3b]">Are you sure ?</p>
        <div class=" w-50 flex justify-between items-center">
          <a href="${table}.php"><button class="py-1 px-2 rounded-md bg-green-400 text-white text-2xl font-bold cursor-pointer">Cancel</button></a>
          <a href="delete.php?id=${id} &target=${table}"><button class="py-1 px-2 rounded-md bg-red-500 text-white text-2xl font-bold cursor-pointer">Delete</button></a>
        </div>
      </div>`;
  main.appendChild(newSection);
}
function editModal(id,amount,description,table,category){
   const newSection = document.createElement("section");
    newSection.classList.add("fixed", "w-full", "h-full", "bg-black/20", "backdrop-filter", "backdrop-blur-xs", "flex", "justify-center", "items-center","overlay");
    newSection.innerHTML = `<div class="w-[80%] h-[60%] xl:w-[50%] 2xl:w-[40%] bg-slate-100 rounded-md shadow-xl flex items-center justify-center relative">
      <form class="flex flex-col w-full h-full items-center justify-center gap-3 2xl:gap-5" action="edit.php?id=${id}&target=${table}" method="post">
        <label for="amount" class="text-xl font-bold text-[#021c3b] self-start pl-8 xl:pl-16 2xl:pl-20">Amount :</label>
        <input class="py-2 pl-2 w-[80%] bg-white rounded-md" type="number" name="amount" id="amount" step="0.01"
          title="ex : x.xx" value="${amount}">
        <label for="category"
          class="text-xl font-bold text-[#021c3b] self-start pl-8 xl:pl-16 2xl:pl-20">Category</label>
        <select class="py-2 pl-2 w-[80%] bg-white rounded-md" name="category" id="category">
          <option value="Salary" 
            title="This is income you earn from a job, where you are paid an hourly rate to complete set tasks. The more hours you work, the more money you earn.">
            Salary</option>
          <option value="Wages" 
            title="Similar to wages, this is money you earn from a job. Your annual salary is usually set out in a contract and paid either weekly, fortnightly or monthly. Usually the amount is regular and you won’t earn more for extra hours worked." >
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
        <label for="description" class="text-xl font-bold text-[#021c3b] self-start pl-8 xl:pl-16 2xl:pl-20">Description
          : </label>
        <textarea class="py-1 pl-2 w-[80%] h-40 bg-white resize-none rounded-md" name="description"
          id="description">${description}</textarea>
        <button type="submit" class="cursor-pointer py-1 px-2 bg-green-600 text-white rounded-md xl:text-xl font-bold">EDIT</button>
      </form>
      <a href="${table}.php"><button
        class="cursor-pointer w-10 h-10 bg-red-500 text-white text-xl font-bold rounded-full absolute -top-2 -right-2 xl:text-2xl">X</button></a>
    </div>`;
  main.appendChild(newSection);
  const select = document.getElementById("category");
  select.value = category;
}

