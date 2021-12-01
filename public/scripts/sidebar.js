const BASE_URL = "http://localhost/mvcphp"
const sidebarWrap = document.querySelector("#sidebarwrap");
const search = document.querySelector("#search");
const searchPanel = document.querySelector("#searchPanel");
const cart = document.querySelector("#cart");
const closeSide = document.querySelector("#closesidebar");
const sidePanel = document.querySelector("#sidebar");
const sideBarTitle = document.querySelector("#sidebar-title");
const searchForm = document.querySelector("#searchForm")
const cartPanel = $("#cartPanel");
const searchItem = $("#searchProduct");

searchForm.addEventListener("submit",(e) => {
  e.preventDefault();
  let kw = searchForm.firstElementChild.value
  sideBarTitle.innerHTML = "TÌM KIẾM";
  $.post(`${BASE_URL}/Ajax/searchproduct`, { keyword: kw }, (data) => {
    searchItem.html(data);
  });
})

search.addEventListener("click", () => {
  sideBarTitle.innerHTML = "TÌM KIẾM";
  $.post(`${BASE_URL}/Ajax/searchproduct`, { keyword: "Quan ao" }, (data) => {
    searchItem.html(data);
  });
  searchPanel.classList.remove("hidden");
  sidebarWrap.classList.remove("hidden");
  sidePanel.classList.remove("hidden");
});
cart.addEventListener("click", () => {
  sideBarTitle.innerHTML = "GIỎ HÀNG";
  console.log("cart open");
  $.post(`${BASE_URL}/Ajax/getcart`, (data) => {
    cartPanel.html(data);
    data &&
      $.getScript(`${BASE_URL}/public/scripts/deleteSideCartItem.js`, () => {
      });
  });
  cartPanel.removeClass("hidden");
  sidebarWrap.classList.remove("hidden");
  sidePanel.classList.remove("hidden");
});

closeSide.addEventListener("click", () => {
  sidePanel.classList.add("slide-out");
  setTimeout(() => {
    sidebarWrap.classList.add("hidden");
    if (sidePanel.classList.contains("slide-out")) {
      sidePanel.classList.remove("slide-out");
      sidePanel.classList.add("hidden");
    }
    if (!searchPanel.classList.contains("hidden")) {
      searchPanel.classList.add("hidden");
    }
    if (!cartPanel.hasClass("hidden")) {
      cartPanel.addClass("hidden");
    }
  }, 100);
  searchItem.html("");
  cartPanel.html("");
  delete sbDeleteCartItems;
});


const decrButton = document.querySelector("#qty-detail-dec");
const incrButton = document.querySelector("#qty-detail-inc");
const quantityInput = document.querySelector("#quantity");


incrButton.addEventListener("click", (e) => {
  e.preventDefault();
  let a = document.querySelector("input[name=size]:checked");
  console.log(a.value);
  let curQty = parseInt(quantityInput.value);
  quantityInput.setAttribute("value", curQty + 1);
});


decrButton.addEventListener("click", (e) => {
  e.preventDefault();
  let a = document.querySelector("input[name=size]:checked");
  console.log(a.value);
  let curQty = parseInt(quantityInput.value);
  curQty > 1 && quantityInput.setAttribute("value", curQty - 1);
});