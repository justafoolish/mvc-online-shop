const input = document.querySelectorAll("[fType='inp']");
const label = document.querySelectorAll("[fType='lbl']");

for (let i = 0; i < input.length; i++) {
  input[i].addEventListener("change", (e) => {
    if (e.target.value.length > 0) label[i].classList.add("shrink");
    else label[i].classList.remove("shrink");
  });
}

const datePick = document.querySelector("#date");
datePick && datePick.addEventListener("focus", (e) => (e.target.type = "date"));
datePick && datePick.addEventListener("blur", (e) => {
  let dateValue = e.target.value === "" ? "" : new Date(e.target.value);
  e.target.type = "text";
  e.target.value && (e.target.value = dateValue.toLocaleDateString("en-US"));
});


/*
  Check Login
  Todo: 
  1. Get email element
  2. Get password element
  3. Get submit element

  4. Call ajax function
  5. Check response
  6. Show message
*/

const emailLogin = document.querySelector("#logmail")
const passwdLogin = document.querySelector("#logpasswd")
const submitLogin = document.querySelector("#login");

const showMessage = (element, message) => {
  element.classList += " border-red-500 focus:border-red-500"
  element.parentElement.querySelector("#message").classList.remove("hidden")
  element.parentElement.querySelector("#message").innerHTML = message
}
const removeMessage = (element) => {
  element.classList.remove("border-red-500")
  element.classList.remove("focus:border-red-500")
  element.parentElement.querySelector("#message").classList.add("hidden")

}
submitLogin.addEventListener("click",(e) => {
  e.preventDefault();

  $.post(`${BASE_URL}/Account/checklogin`,{
    submit: true,
    email: emailLogin.value,
    password: passwdLogin.value
  }, (data)=> {
    switch(parseInt(data)) {
      case 1:
        document.location.href = `${BASE_URL}/Home/`
        break;
      case 0:
        showMessage(passwdLogin,"Mật khẩu không đúng")
        break;
      case -1:
        showMessage(emailLogin,"Email không tồn tại")
    }
  })
})

emailLogin.addEventListener("input", () => {
  removeMessage(emailLogin)
})
passwdLogin.addEventListener("input",() => {
  removeMessage(passwdLogin)
})
