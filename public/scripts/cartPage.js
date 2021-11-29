const incrButton = document.querySelectorAll("#qty-detail-inc");
const decrButton = document.querySelectorAll("#qty-detail-dec");
const input = document.querySelectorAll("#quantity");
const deleteItem = document.querySelectorAll("#deleteItem");

incrButton.forEach((ele, idx) => {
  ele.addEventListener("click", (e) => {
    e.preventDefault();
    let quantity = parseInt(input[idx].value);
    //Update cart rồi mới set input.value
    input[idx].value = ++quantity;
    //Cập nhật tổng tiền bill
  });
});

decrButton.forEach((ele, idx) => {
  ele.addEventListener("click", (e) => {
    e.preventDefault();
    let quantity = parseInt(input[idx].value);
    //Update cart rồi mới set input.value

    input[idx].value = quantity > 0 ? --quantity : quantity;

    //Cập nhật tổng tiền bill
  });
});

deleteItem.forEach((ele, idx) => {
  ele.addEventListener("click", (e) => {
    e.preventDefault();
    //Cập nhật trong session trươc rồi mới xoá
    deleteItem[idx].closest("#cartItem").remove();

    if (!document.querySelectorAll("#cartItem").length) {
      document.querySelector("main div:first-child").innerHTML = `<div class="w-full my-5 pb-5 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40 text-gray-800 mx-auto mb-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        <h3 class="text-center">Giỏ hàng đang trống</h3>
        <a href="../Collection" class="my-5 bg-gray-800 text-gray-50 px-6 py-3 hover:bg-gray-600 transition-all">Tiếp tục mua hàng</a>
    </div>`;
      document.querySelector("#checkout").removeAttribute("href");
    }
  });
});
