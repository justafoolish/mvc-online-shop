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
  $.post(`${BASE_URL}/Ajax/getquantity`, { pid: pid.innerHTML, size: rad.value }, (data) => {
    let maxQuantity = parseInt(data);
    let curQty = parseInt(quantityInput.value);
    curQty < maxQuantity && quantityInput.setAttribute("value", curQty + 1);
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
  $.post(`${BASE_URL}/Cart/checkquantity`, {pid: addcart.value, size: [`${rad.value}`]}, (data)=> {
    console.log(data);
    document.querySelector("#totalItem").innerHTML = data
  })
})