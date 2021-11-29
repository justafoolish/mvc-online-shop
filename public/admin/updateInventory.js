const incrButton = document.querySelectorAll("#increase");
const decrButton = document.querySelectorAll("#decrease");
const input = document.querySelectorAll("#quantity");
const currentQuantity = document.querySelectorAll("#current");
const newQuantity = document.querySelectorAll("#new");

incrButton.forEach((ele, idx) => {
  ele.addEventListener("click", (e) => {
    e.preventDefault();
    let quantity = parseInt(input[idx].value);
    input[idx].value = ++quantity;
    newQuantity[idx].classList.remove("hidden");
    newQuantity[idx].innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
    </svg>${parseInt(currentQuantity[idx].innerHTML) + quantity}
    `;
  });
});

decrButton.forEach((ele, idx) => {
  ele.addEventListener("click", (e) => {
    e.preventDefault();
    let quantity = parseInt(input[idx].value);
    input[idx].value = quantity > 0 ? --quantity : quantity;
    if (quantity) {
      newQuantity[idx].innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>${parseInt(currentQuantity[idx].innerHTML) + quantity}
        `;
    } else {
      newQuantity[idx].classList.add("hidden");
    }
  });
});


