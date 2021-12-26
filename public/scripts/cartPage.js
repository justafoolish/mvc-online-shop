const incrButton = document.querySelectorAll("#qty-detail-inc");
const decrButton = document.querySelectorAll("#qty-detail-dec");
const input = document.querySelectorAll("#quantity");
const deleteItem = document.querySelectorAll("#deleteItem");
const productTotal = document.querySelectorAll("#product-total")
const totals = document.querySelector("#cartTotal")
const cartTotal = document.querySelector("#totalItem")

//Cập nhật dom
const updateDom = (idx, quantity, totalAmount, subTotal, totalItem) => {
  input[idx].value = quantity; //cập nhật quantiy mới trong input
  //Cập nhật tông tiền bill
  totals.innerHTML = `${new Intl.NumberFormat('de-DE').format(parseInt(totalAmount))} <sup>vnđ</sup>`; 
  
  //Cập nhật tổng tiền từng sản phẩm
  productTotal[idx].innerHTML = `${new Intl.NumberFormat('de-DE').format(subTotal)} <u>đ</u>`

  //Cập nhật sô lượng trong icon giỏ hàng
  cartTotal.innerHTML = totalItem
}

//Lất value từ attr
const getProductInfo = (element, attr1, attr2) => {
  return [element.getAttribute(attr1), element.getAttribute(attr2)]
}

incrButton.forEach((ele, idx) => {
  ele.addEventListener("click", (e) => {
    e.preventDefault(); // ngăn reload form
    
    let quantity = parseInt(input[idx].value); //giá trị ô input số lượng sản phẩm trong list cart item

    let [productID, productSize] = getProductInfo(ele,"pid","size"); //lấy value pid và size
    
    //gọi ajax tăng quantity    
    $.post(`${BASE_URL}/Cart/updateQuantity`, {pid: productID, size: productSize, option: 1}, (data)=> {
      data = jQuery.parseJSON(data);
      if(data.update) {
        let prod = data.cart[productID+productSize]
        updateDom(idx,++quantity,parseInt(data.totalAmount),parseInt(prod['SoLuong'])*parseInt(prod['DonGia']),data.totalProduct)
      }
    })
    
  });
});

decrButton.forEach((ele, idx) => {
  ele.addEventListener("click", (e) => {
    e.preventDefault(); // ngăn reload page
    
    let quantity = parseInt(input[idx].value); //value ô input số lượng

    let [productID, productSize] = getProductInfo(ele,"pid","size"); //lấy value pid và size

    if(quantity > 1) {
      $.post(`${BASE_URL}/Cart/updateQuantity`, {pid: productID, size: productSize, option: 2}, (data)=> {
        data = jQuery.parseJSON(data);

        let prod = data.cart[productID+productSize]
       
        updateDom(idx,--quantity,parseInt(data.totalAmount),parseInt(prod['SoLuong'])*parseInt(prod['DonGia']),data.totalProduct)
      })
    }
  });
});

deleteItem.forEach((ele, idx) => {
  ele.addEventListener("click", (e) => {
    e.preventDefault();

    $.post(`${BASE_URL}/Cart/deletecartitem`,{cartID: ele.value}, (data)=> {
      document.querySelector("#cartTotal").innerHTML = `${new Intl.NumberFormat('de-DE').format(parseInt(data))} <sup>vnđ</sup>`
    })

    deleteItem[idx].closest("#cartItem").remove();

    if (!document.querySelectorAll("#cartItem").length) {
      document.querySelector("main div:first-child").innerHTML = `<div class="w-full my-5 pb-5 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40 text-gray-800 mx-auto mb-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        <h3 class="text-center mb-5">Giỏ hàng đang trống</h3>
        <a href="../Collection" class="my-5 bg-gray-800 text-gray-50 px-6 py-3 hover:bg-gray-600 transition-all">Tiếp tục mua hàng</a>
    </div>`;
      document.querySelector("#checkout").removeAttribute("href");
    }
  });
});
