// const BASE_UR = "http://localhost/mvcphp"
const BASE_UR = "https://clone-hades.herokuapp.com/";
const loc = window.location.pathname;
const dir = loc.substring(0, loc.lastIndexOf("/"));
const path = dir.split("/");
const currentURL = path[path.length - 1].toLowerCase();

const adminNavItems = document.querySelectorAll(".nav-item");
const changeActive = (i) => {
  adminNavItems[i] && adminNavItems[i].classList.remove("hover:bg-gray-600", "hover:text-white", "text-gray-400");
  adminNavItems[i] && (adminNavItems[i].className += " text-white border-l-4 border-white bg-gray-600");
};

window.onload = () => {
  switch (currentURL) {
    case "":
    case "index":
    case "mvcphp":
    case "admin":
    case "dashboard":
      changeActive(0);
      break;
    case "ordermanage":
    case "orderdetail":
      changeActive(1);
      break;
    case "product": 
    case "insertproduct":
    case "categorymanage":
    case "addcategory":
    case "inventory":
    case "productmanage":
    case "detail":
      document.querySelector("#sptarget").classList.remove("h-0");
      document.querySelector("#sp > span.transform").classList.add("rotate-90");
      changeActive(2);
      break;
    case "customermanage":
    case "viewdetail":
      changeActive(3);
      break;
    case "discountmanage":
    case "formadd":
    case "formaddauto":
      changeActive(4);
      break;
    case "report":
      changeActive(5);
      break;
    case "employeemanage":
      changeActive(6);
      break;
  }
};

const arrowIcon = document.querySelector("#sp")

arrowIcon && arrowIcon.addEventListener("click", () => {
  document.querySelector("#sptarget").classList.toggle("h-0");
  document.querySelector("#sp > span.transform").classList.toggle("rotate-90");
});




const createCode = document.querySelector("#create-code");
const codeInput = document.querySelector("input[name=code]")

createCode && createCode.addEventListener("click",(e) => {
  e.preventDefault();
  codeInput.value = (Math.random() + 1).toString(36).substring(5).toUpperCase();
})