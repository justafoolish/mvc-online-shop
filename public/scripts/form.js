const input = document.querySelectorAll("[fType='inp']");
const label = document.querySelectorAll("[fType='lbl']");

input.forEach((ele, idx) => {
  ele.addEventListener("change", (e) => {
    if(e.target.value.length > 0) label[idx].classList.add("shrink")
    else label[idx].classList.remove("shrink")
  })
})

const datePick = document.querySelector("#date");
datePick && datePick.addEventListener("focus", (e) => (e.target.type = "date"));
datePick && datePick.addEventListener("blur", (e) => {
  let dateValue = e.target.value === "" ? "" : new Date(e.target.value);
  e.target.type = "text";
  e.target.value && (e.target.value = dateValue.toLocaleDateString("en-US"));
});


//------------- Login Page -----------//
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
submitLogin && submitLogin.addEventListener("click",(e) => {
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

emailLogin && emailLogin.addEventListener("input", () => {
  removeMessage(emailLogin)
})
passwdLogin && passwdLogin.addEventListener("input",() => {
  removeMessage(passwdLogin)
})
//------------- End Login Page -----------//

//------------- Register Page -----------//
const submitRegister = document.querySelector("#submitRegister")

$.fn.serializeObject = function(){
  var o = {};
  var a = this.serializeArray();
  $.each(a, function() {
      if (o[this.name] !== undefined) {
          if (!o[this.name].push) {
              o[this.name] = [o[this.name]];
          }
          o[this.name].push(this.value || '');
      } else {
          o[this.name] = this.value || '';
      }
  });
  o['submit'] = true;
  return o;
};

submitRegister && submitRegister.addEventListener("click", (e) => {
  e.preventDefault();
  let checkForm = 1;
  
  //Validate each input element
  //First rule are not null or empty value
  
  input.forEach((ele) => {
    ele.value.length === 0 && (checkForm = 0);
  })
  let objectData = $('#registerForm').serializeObject()

  checkForm && $.post(`${BASE_URL}/Account/checkregister`, objectData, (data) => {
    switch(parseInt(data)) {
      case 1:
        submitRegister.disabled = true
        showPageMessage("Đăng ký thành công")
        setTimeout(() => {
          document.location.href = `${BASE_URL}/Account/Login`
        },750)
        break;
      case 0:
        showPageMessage("Đăng ký thất bại")
        setTimeout(() => {
          pageMessage.classList.add("hidden")
        },550)
        break;
      case -1:
        showPageMessage("Vui lòng nhập lại")
        setTimeout(() => {
          pageMessage.classList.add("hidden")
        },550)
        break;
    }
    
  })
})
