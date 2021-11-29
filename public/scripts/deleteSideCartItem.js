sbDeleteCartItems = document.querySelectorAll("#delete-cart-item-sidebar");

sbDeleteCartItems.forEach((ele, idx) => {
  ele.addEventListener("click", (e) => {
    e.preventDefault();
    //Xoa trong session truoc
    ele.closest("#cart-item-sidebar").remove();
    //update total price in cart sidebar
  });
});
