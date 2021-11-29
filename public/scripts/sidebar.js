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
  let keyword = searchForm.firstElementChild.value
  sideBarTitle.innerHTML = "TÌM KIẾM";
  $.post("./src/Views/Templates/search.php", { keyword: keyword }, (data) => {
    // searchItem.html(data);
    console.log(keyword)
  });
})

search.addEventListener("click", () => {
  sideBarTitle.innerHTML = "TÌM KIẾM";
  $.post("./src/Views/Templates/search.php", { keyword: "Quan ao" }, (data) => {
    searchItem.html(data);
  });
  searchPanel.classList.remove("hidden");
  sidebarWrap.classList.remove("hidden");
  sidePanel.classList.remove("hidden");
});
cart.addEventListener("click", () => {
  sideBarTitle.innerHTML = "GIỎ HÀNG";
  $.get("./src/Views/Templates/sideCart.php", (data) => {
    cartPanel.html(data);
    data &&
      $.getScript("../scripts/deleteSideCartItem.js", () => {
        console.log("Script loaded");
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
