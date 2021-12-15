const input = document.querySelectorAll("[fType='inp']");
const label = document.querySelectorAll("[fType='lbl']");

input.forEach((ele, idx) => {
  ele.addEventListener("change", (e) => {
    if (e.target.value.length > 0) label[idx].classList.add("shrink");
    else label[idx].classList.remove("shrink");
  });
});

const emailElement = document.querySelector("#email");
const passwdElement = document.querySelector("#password");
const loginElement = document.querySelector("#login");

const showMessage = (element, message) => {
  element.classList += " border-red-500 focus:border-red-500";
  element.parentElement.querySelector("#message").classList.remove("hidden");
  element.parentElement.querySelector("#message").innerHTML = message;
};
const removeMessage = (element) => {
  element.classList.remove("border-red-500");
  element.classList.remove("focus:border-red-500");
  element.parentElement.querySelector("#message").classList.add("hidden");
};
loginElement &&
  loginElement.addEventListener("click", (e) => {
    e.preventDefault();

    $.post(
      `${BASE_UR}/Admin/checkLoginAdmin`,
      {
        submit: true,
        email: emailElement.value,
        password: passwdElement.value,
      },
      (data) => {
        switch (parseInt(data)) {
          case 1:
            document.location.href = `${BASE_UR}/Admin/`;
            console.log(data);
            break;
          case 0:
            showMessage(passwdElement, "Mật khẩu không đúng");
            break;
          case -1:
            showMessage(emailElement, "Email không tồn tại");
        }
      }
    );
  });

emailElement &&
  emailElement.addEventListener("input", () => {
    removeMessage(emailElement);
  });
passwdElement &&
  passwdElement.addEventListener("input", () => {
    removeMessage(passwdElement);
  });
