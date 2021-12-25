var items = []
        const updateQuantityDOM = (value) => {
            document.querySelector("#new").innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>${parseInt($("#inv").text()) + parseInt(value)}
                `;
            !value && $("#new").addClass("hidden") || $("#new").removeClass("hidden")
        }
        $("#product-list").on("change", () => {
            let qty = $("#product-list option:selected").attr("quantity")
            const cur = document.querySelector("#inv")
            parseInt(qty) < 5 && (cur.classList = "text-yellow-500") || (cur.classList = "text-green-500")
            $("#inv").text(qty)

        })
        $("#updateQuantity").on("input", () => {
            updateQuantityDOM($("#updateQuantity").val())
        })
        const insertTable = ({
            masp,
            tensp,
            size,
            soluong,
            dongia
        }) => {
            const tr = `<tr class="grid grid-cols-12">
                            <td class="text-center col-span-2">${masp}</td>
                            <td class="col-span-5">${tensp}</td>
                            <td class="text-center col-span-2">${soluong}</td>
                            <td class="text-center col-span-2">${new Intl.NumberFormat('de-DE').format(dongia)}đ</td>
                            <td>
                                <button id="remove" class="hover:text-red-500 transition-all removeItem" ma="${masp}" size="${size}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                                <input type="hidden" name="product['MaSP'][]" value="${masp}">
                                <input type="hidden" name="product['MaSize'][]" value="${size}">
                                <input type="hidden" name="product['SoLuong'][]" value="${soluong}">
                                <input type="hidden" name="product['DonGia'][]" value="${dongia}">
                            </td>
                        </tr>`

            $("#table").append(tr)
        }
        //Onclick thêm vào table
        $("#add").on("click", function(e) {
            e.preventDefault();
            //Lấy được data trên form nhập sản phẩm
            // console.log($("#updateQuantity").val() >= 1 ? "ok" : "ko")
            if ($("#product-list option:selected").attr("value") && $("#updateQuantity").val() >= 1 && $("#price").val()) {
                let product = {
                    masp: $("#product-list option:selected").attr("value"),
                    tensp: $("#product-list option:selected").text(),
                    size: $("#product-list option:selected").attr("size"),
                    soluong: $("#updateQuantity").val(),
                    dongia: $("#price").val(),
                    ton: $("#inv").text()
                }
                !items.find(e => e.masp == product.masp && e.size == product.size) && items.push(product);
                $("#table").text("")
                items.forEach(product => insertTable(product))
            }
        })
        const removeItem = (e) => {
            e.preventDefault();
            let masp = e.target.closest("button").getAttribute("ma")
            let size = e.target.closest("button").getAttribute("size")
            items.splice(items.indexOf(items.find(ele => ele.masp == masp && ele.size == size)),1)
            e.target.closest("tr").remove()
        }
        $(document).ready(() => {
            $(document).on("click", "button[id=remove]", (e) => removeItem(e))
        })
        $("button[name=submit]").on("click",(e) => {
            e.preventDefault();
            // console.log(items)
            const sups = $("#ncc option:selected").val()
            
            sups && items.length && $.post(`${BASE_UR}/ProductManage/createInventoryReceipt`,{submit: true, data: items, supplier: sups}, (data) => {
                console.log(data);
                switch(parseInt(data)) {
                    case 1:
                        $("button[name=submit]").prop("disabled", true);
                        $("#header").append(`<div class="absolute px-4 py-2 bg-green-500 font-medium text-base text-gray-50 shadow bottom-3 mr-2">
                        Cập nhật thành công
                    </div>`)
                        setTimeout(function() {
                            document.location.href = `${BASE_UR}/ProductManage`
                        },650);
                        break;
                    case 0: 
                        $("#header").append(`<div id="noti" class="absolute px-4 py-2 bg-red-500 font-medium text-base text-gray-50 shadow bottom-3 mr-2">
                        Vui lòng thử lại
                    </div>`);
                        setTimeout(function() {
                            $("#noti").remove()
                        },350);
                        break;
                }
            })
        })