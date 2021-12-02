sbDeleteCartItems = document.querySelectorAll("#delete-cart-item-sidebar");

sbDeleteCartItems.forEach((ele, idx) => {
  ele.addEventListener("click", (e) => {
    e.preventDefault();
    //Xoa trong session truoc
    $.post(`${BASE_URL}/Cart/deletecartitem`,{cartID: ele.value}, (data)=> {
      document.querySelector("#total").innerHTML = `${new Intl.NumberFormat('de-DE').format(parseInt(data))} <sup>vnđ</sup>`
      console.log(data);
    })
    ele.closest("#cart-item-sidebar").remove();
    //update total price in cart sidebar
  });
});
