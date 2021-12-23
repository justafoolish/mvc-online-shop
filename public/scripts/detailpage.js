const decrButton = document.querySelector("#qty-detail-dec");
const incrButton = document.querySelector("#qty-detail-inc");
const quantityInput = document.querySelector("#quantity");

var rad = document.querySelectorAll("input[name=size]");
var prev = null;
for (var i = 0; i < rad.length; i++) {
    rad[i].addEventListener('change', function() {
        if (this !== prev) {
            prev = this;
            quantityInput.setAttribute("value",1)
        }
        
    });
}

incrButton.addEventListener("click", (e) => {
  e.preventDefault();
  let rad = document.querySelector("input[name=size]:checked");
  let pid = document.querySelector("#product-id");
  $.post(`${BASE_URL}/Product/GetQuantity`, { pid: pid.innerHTML, size: rad.value }, (data) => {
    let maxQuantity = parseInt(data);
    let curQty = parseInt(quantityInput.value);
    curQty < maxQuantity && quantityInput.setAttribute("value", curQty + 1);
    maxQuantity === 0 && quantityInput.setAttribute("value", 0)
  });
  
});


decrButton.addEventListener("click", (e) => {
  e.preventDefault();
  let curQty = parseInt(quantityInput.value);
  curQty > 1 && quantityInput.setAttribute("value", curQty - 1);
});

const addcart = document.querySelector("#addcart")

addcart.addEventListener("click", (e) => {
  e.preventDefault();
  let rad = document.querySelector("input[name=size]:checked");
  let qty = parseInt(quantityInput.value)
  // console.log(qty)
  $.post(`${BASE_URL}/Cart/checkQuantity`, {pid: addcart.value, size: [`${rad.value}`], quantity: qty ?? 1}, (data)=> {
    document.querySelector("#totalItem").innerHTML = data
  })
})