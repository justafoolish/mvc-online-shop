const variantSelectBox = document.querySelector("#variantSelectBox").cloneNode(true);
const imgInp = document.querySelectorAll("[name='image[]']");
const dltBtn = document.querySelectorAll(".dlt-btn");
const preview = document.querySelectorAll(".preview");

for (let i = 0; i < dltBtn.length; i++) {
  dltBtn[i].addEventListener("click", (e) => {
    e.preventDefault();
    imgInp[i].value = "";
  });
}

$(document).ready(() => {
  $("#variant").click((e) => {
    e.preventDefault();
    if (document.querySelector("#listVariant").childElementCount < 2) {
      document.querySelector("#listVariant").appendChild(variantSelectBox);
    } else if (document.querySelector("#listVariant").childElementCount < 4) {
      $("#variantSelectBox:first").clone().insertAfter("#variantSelectBox:last");
    }
    if (document.querySelector("#listVariant").childElementCount >= 4) {
      $("#variant").addClass("hidden");
    }
  });

  $(document).on("click", "#deleteVariant", (e) => {
    e.preventDefault();
    e.target.closest("#variantSelectBox").remove();
    if (document.querySelector("#listVariant").childElementCount < 4) {
      $("#variant").removeClass("hidden");
    }
  });
});
