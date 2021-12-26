var submitAble = true;
const submitForm = document.querySelector("button[name=submitBtn]")
const verify = $("#verify")
const voucher = document.querySelector("#voucher")
const discount = document.querySelector("#discount")
const totalValue = document.querySelector("#hidden-total")
const total = document.querySelector("#total")

const success = "col-span-2 py-2 px-3 rounded text-gray-800 transition-all border-4 border-green-500"
const warning = "col-span-2 py-2 px-3 rounded text-gray-800 transition-all border-4 border-red-500"
const primary = "col-span-2 border-4 py-2 px-3 rounded border-gray-400 text-gray-800 focus-within:border-gray-600 transition-all"

const convertNumber = (number) => {
    return `${new Intl.NumberFormat('de-DE').format(number)}<sup>đ</sup>`
}

verify.on("click",(e) => {
    e.preventDefault()
    let value = voucher.value;
    
    $.post(`${BASE_URL}/Checkout/VerifyDiscount`, {code: value}, (data)=>{
        if(parseInt(data)) {
            voucher.parentElement.classList=success
            discount.innerHTML = convertNumber(parseInt(totalValue.innerHTML)*parseInt(data)/100);
            total.innerHTML = convertNumber(parseInt(totalValue.innerHTML) - parseInt(totalValue.innerHTML)*parseInt(data)/100)
            submitAble = true
        } else {
        voucher.parentElement.classList=warning
        submitAble = false
        }   
    })
})
voucher.addEventListener("input",() => {
    voucher.parentElement.classList=primary
    discount.innerHTML=0
    total.innerHTML = `${new Intl.NumberFormat('de-DE').format(parseInt(totalValue.innerHTML))}<sup>đ</sup>`

    submitAble=true
})
submitForm.addEventListener("click",(e) => {
    !submitAble && e.preventDefault();
})