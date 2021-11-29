const product = document.querySelector("#product").cloneNode(true);

$(document).ready(() => {
  $("#addProduct").click((e) => {
    e.preventDefault();
    if (document.querySelector("#listProduct").childElementCount > 1) {
      $("#product:first").clone().insertAfter("#product:last");
    } else {
      document.querySelector("#listProduct").appendChild(product);
    }
  });

  $(document).on("click", "#deleteProduct", (e) => {
    e.preventDefault();
    e.target.closest("#product").remove();
  });
});
