// const BASE_URL = "http://localhost/mvcphp"
const BASE_URL = "https://clone-hades.herokuapp.com"

const sidebarWrap = $("#sidebarwrap");
const searchPanel = $("#searchPanel");
const sidePanel = $("#sidebar");
const sideBarTitle = document.querySelector("#sidebar-title");
const searchForm = document.querySelector("#searchForm")
const cartPanel = $("#cartPanel");
const searchItem = $("#searchProduct");

/*----------- Mở sidebar  -------------*/
const openSidebar = element => {
  element && element.removeClass("hidden");
  sidebarWrap.removeClass("hidden");
  sidePanel.removeClass("hidden");
}

/*------------ Đóng sidebar -------------*/
const closeSideBar = () => {
  sidePanel.addClass("slide-out");

  setTimeout(() => {
    sidebarWrap.addClass("hidden");
    if (sidePanel.hasClass("slide-out")) {
      sidePanel.removeClass("slide-out");
      sidePanel.addClass("hidden");
    }
    !searchPanel.hasClass("hidden") && searchPanel.addClass("hidden")

    !cartPanel.hasClass("hidden") && cartPanel.addClass("hidden")
  }, 100);

  searchItem.html("");
  cartPanel.html("");
  
  delete sbDeleteCartItems;
}

/*----------- Tìm kiếm  ---------------*/
const searchInit = () => {
  sideBarTitle.innerHTML = "TÌM KIẾM";
  // $.post(`${BASE_URL}/Product/Index/Search`, { keyword: "Quan ao" }, (data) => {
  //   searchItem.html(data);
  // });

  openSidebar(searchPanel);
}

/*----------- Submit Tìm kiếm -------------*/
const submitSearch = (e) => {
  e && e.preventDefault();
  let kw = searchForm.firstElementChild.value
  sideBarTitle.innerHTML = "TÌM KIẾM";
  // $.post(`${BASE_URL}/Product/Index/Search`, { keyword: kw }, (data) => {
  //   searchItem.html(data);
  // });
}

/*------------ Hiển thị thông báo -----------*/
//Note: Thông báo cho đăng ký thành công hoặc thất bại
const showPageMessage = (message) => {
  const pageMessage = document.querySelector("#pageMessage");

  pageMessage.innerHTML= message
  pageMessage.classList.remove("hidden");
}

/*------------ Hiển thị giỏ hàng -----------*/
const showCart = () => {
  sideBarTitle.innerHTML = "GIỎ HÀNG";
  // console.log("cart open");
  $.post(`${BASE_URL}/Cart/getsidecart`, (data) => {
    //Show cart
    cartPanel.html(data);

    //Add delete event
    data &&
      $.getScript(`${BASE_URL}/public/scripts/deleteSideCartItem.js`, () => {
      });
  });

  openSidebar(cartPanel);
}
/*-------------- Thêm vào giỏ ------------------*/
const addToCart = element => {
  $.post(`${BASE_URL}/Cart/checkquantity`, {pid: element.value, size: ["M","L","XL"]}, (data)=> {
    // console.log(data);
    document.querySelector("#totalItem").innerHTML = data
  })
}



/* --------------------  function handler  --------------------- */
searchForm.addEventListener("submit",(e) => submitSearch(e))

const search = document.querySelector("#search");
search.addEventListener("click", () => searchInit());

const cart = document.querySelector("#cart");
cart.addEventListener("click", () => showCart());

const closeSide = document.querySelector("#closesidebar");
closeSide.addEventListener("click", () => closeSideBar());

const addToCartButtons = document.querySelectorAll("#addtocart");
addToCartButtons.forEach(ele => {
  ele.addEventListener("click",() => addToCart(ele))
})