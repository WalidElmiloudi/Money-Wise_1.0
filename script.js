// DECLARATION OF VARIABLES
const openLoginModal= document.getElementById("openLoginModal");
const openSignupModal= document.getElementById("openSignupModal");
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

if(openLoginModal){
  openLoginModal.addEventListener("click",()=>{
  loginModal.classList.replace("hidden","flex");
  loginModal.removeAttribute("aria-hidden");
})
}
if(openSignupModal){
  openSignupModal.addEventListener("click",()=>{
  signupModal.classList.replace("hidden","flex");
  signupModal.removeAttribute("aria-hidden");
})
}
document.addEventListener("click",(e)=>{
  if(e.target.classList.contains("overlay")){
    currenttarget = e.target;
    currenttarget.classList.replace("flex","hidden");
    currenttarget.setAttribute("aria-hidden","true");
  }
})
if(signupRedirect){
 signupRedirect.addEventListener("click",()=>{
  loginModal.classList.replace("flex","hidden");
    loginModal.setAttribute("aria-hidden","true");
    signupModal.classList.replace("hidden","flex");
  signupModal.removeAttribute("aria-hidden");
}) 
}
if(loginRedirect){
  loginRedirect.addEventListener("click",()=>{
  signupModal.classList.replace("flex","hidden");
    signupModal.setAttribute("aria-hidden","true");
    loginModal.classList.replace("hidden","flex");
  loginModal.removeAttribute("aria-hidden");
})
}
if(menuIcon){
  menuIcon.addEventListener("click",()=>{
  menu.classList.replace("hidden","flex");
    menu.removeAttribute("aria-hidden");
})
closeMenu.addEventListener("click",()=>{
    menu.classList.replace("flex","hidden");
    menu.setAttribute("aria-hidden","true");
  })
}
if(addIncomeBtn){
  addIncomeBtn.addEventListener("click",()=>{
    incomeModal.classList.replace("hidden","flex");
    incomeModal.removeAttribute("aria-hidden");
  })
  closeIncomeModal.addEventListener("click",()=>{
    incomeModal.classList.replace("flex","hidden");
    incomeModal.setAttribute("aria-hidden","true"); 
  })
}
if(addExpenceBtn){
  addExpenceBtn.addEventListener("click",()=>{
    expenceModal.classList.replace("hidden","flex");
    expenceModal.removeAttribute("aria-hidden");
  })
  closeExpenceModal.addEventListener("click",()=>{
    expenceModal.classList.replace("flex","hidden");
    expenceModal.setAttribute("aria-hidden","true"); 
  })
}