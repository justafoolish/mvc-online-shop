const input = document.querySelectorAll("[fType='inp']");
const label = document.querySelectorAll("[fType='lbl']");

for (let i = 0; i < input.length; i++) {
  input[i].addEventListener("change", (e) => {
    if (e.target.value.length > 0) label[i].classList.add("shrink");
    else label[i].classList.remove("shrink");
  });
}

const datePick = document.querySelector("#date");
datePick.addEventListener("focus", (e) => (e.target.type = "date"));
datePick.addEventListener("blur", (e) => {
  let dateValue = e.target.value === "" ? "" : new Date(e.target.value);
  e.target.type = "text";
  e.target.value && (e.target.value = dateValue.toLocaleDateString("en-US"));
});
