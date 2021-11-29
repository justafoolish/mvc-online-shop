const decrButton = document.querySelector("#qty-detail-dec");
const incrButton = document.querySelector("#qty-detail-inc");
const quantityInput = document.querySelector("#quantity");

incrButton.addEventListener("click", (e) => {
  e.preventDefault();
  let curQty = parseInt(quantityInput.value);
  quantityInput.setAttribute("value", curQty + 1);
});
decrButton.addEventListener("click", (e) => {
  e.preventDefault();
  let curQty = parseInt(quantityInput.value);
  curQty > 1 && quantityInput.setAttribute("value", curQty - 1);
});