const incrButtonElement = document.querySelectorAll("#increase");
const decrButtonElement = document.querySelectorAll("#decrease");
const inputElement = document.querySelectorAll("#quantity");
const currentQuantity = document.querySelectorAll("#current");
const newQuantity = document.querySelectorAll("#new");
const submitQuantity = document.querySelectorAll("#updateQuantity");

const updateQuantityDOM = (index, value) => {
  newQuantity[index].innerHTML = `
  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
  </svg>${parseInt(currentQuantity[index].innerHTML) + value}
  `;
}

incrButtonElement.forEach((ele, idx) => {
  ele.addEventListener("click", (e) => {
    e.preventDefault();
    let quantity = parseInt(inputElement[idx].value);
    inputElement[idx].value = ++quantity;
    newQuantity[idx].classList.remove("hidden");
    updateQuantityDOM(idx,quantity);
  });
});

decrButtonElement.forEach((ele, idx) => {
  ele.addEventListener("click", (e) => {
    e.preventDefault();
    let quantity = parseInt(inputElement[idx].value);
    inputElement[idx].value = quantity > 0 ? --quantity : quantity;
    if (quantity) {
      updateQuantityDOM(idx,quantity);
    } else {
      newQuantity[idx].classList.add("hidden");
    }
  });
});

inputElement.forEach((ele, idx) => {
  ele.addEventListener("input", (e) => {
    let qty = parseInt(e.target.value)
    if(qty) {
      newQuantity[idx].classList.remove("hidden");
      ele.setAttribute("value",qty)
      updateQuantityDOM(idx,qty);
    } else {
      newQuantity[idx].classList.add("hidden");

    }
  })
})
const updateQuantity = (idx, qty) => {
  newQuantity[idx].classList.add("hidden")
  qty > 5 && (currentQuantity[idx].classList = "text-green-500")
  currentQuantity[idx].innerHTML = qty
  inputElement[idx].value = 0
}

submitQuantity.forEach((ele, idx) => {
  ele.addEventListener("click",() => {
    if(parseInt(inputElement[idx].value)) {
      let updateInfo = {
        pid: ele.getAttribute("pid"),
        size: ele.getAttribute("size"),
        quantity: parseInt(inputElement[idx].value) + parseInt(currentQuantity[idx].innerHTML)
      }

      $.post(`${BASE_UR}/ProductManage/updatevariantquantity`,updateInfo,(data) => {
        if(parseInt(data)) {
          updateQuantity(idx,parseInt(data));
        } else {
          alert("Cập nhật thất bại")
        }
      })
    } else {
      alert("Hãy nhập số lượng mới")
    }
  })
})


