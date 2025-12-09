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
const filterBtn = document.getElementById("filterBtn");
const sortBtn = document.getElementById("sortBtn");
const filter = document.getElementById("filter");
const sort = document.getElementById("sort");

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
    if(table == "incomes"){
      
    } else{
      newSection.innerHTML = `<div class="w-[80%] h-[60%] xl:w-[50%] 2xl:w-[40%] bg-slate-100 rounded-md shadow-xl flex items-center justify-center relative">
      <form class="flex flex-col w-full h-full items-center justify-center gap-3 2xl:gap-5" action="edit.php?id=${id}&target=${table}" method="post">
        <label for="amount" class="text-xl font-bold text-[#021c3b] self-start pl-8 xl:pl-16 2xl:pl-20">Amount :</label>
        <input class="py-2 pl-2 w-[80%] bg-white rounded-md" type="number" name="amount" id="amount" step="0.01"
          title="ex : x.xx" value="${amount}">
        <label for="category"
          class="text-xl font-bold text-[#021c3b] self-start pl-8 xl:pl-16 2xl:pl-20">Category</label>
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
        <label for="description" class="text-xl font-bold text-[#021c3b] self-start pl-8 xl:pl-16 2xl:pl-20">Description
          : </label>
        <textarea class="py-1 pl-2 w-[80%] h-40 bg-white resize-none rounded-md" name="description"
          id="description">${description}</textarea>
        <button type="submit" class="cursor-pointer py-1 px-2 bg-green-600 text-white rounded-md xl:text-xl font-bold">EDIT</button>
      </form>
      <a href="${table}.php"><button
        class="cursor-pointer w-10 h-10 bg-red-500 text-white text-xl font-bold rounded-full absolute -top-2 -right-2 xl:text-2xl">X</button></a>
    </div>`;
    }
    
  main.appendChild(newSection);
  const select = newSection.querySelector("#category");
  select.value = category;
  console.log(select.value);
}

filterBtn.addEventListener("click",()=>{
  filter.classList.toggle("hidden");
})

sortBtn.addEventListener("click",()=>{
  sort.classList.toggle("hidden");
})