<?php require_once "./src/Views/Admin/Templates/navbar.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php 
    $products = $data['products'];
?>
<head>
    <?php require_once "./src/Views/Admin/Templates/header.php" ?>
</head>

<body>
    <div class="relative min-h-screen flex">
        <!-- side bar -->
        <?php require_once "./src/Views/Admin/Templates/sidebar.php" ?>
        <!-- main content -->
        <div class="flex-1 mb-10">
            <form action="index.php" method="post">
                <header class='flex justify-end items-center py-4 sticky top-0 inset-x-0 bg-white z-10 shadow-lg px-10 space-x-3'>
                    <a class="text-xs py-2 px-5 bg-gray-500 hover:bg-gray-600 transition-all text-gray-50" href="../">Huỷ</a>
                    <button class="text-xs py-2 px-5 bg-blue-500 hover:bg-blue-600 transition-all text-gray-50" type="submit">Lưu</button>
                </header>
                <main class="px-10 mt-5">
                    <h3 class="font-semibold text-2xl border-b pb-2">Tạo danh sách khuyến mãi</h3>
                    <div class="grid grid-cols-6 mt-2 gap-4 divide-gray-400 divide-x">
                        <div class="col-span-4 space-y-3">
                            <div>
                                <label>Mức giảm (%)</label>
                                <input type="number" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" placeholder="Nhập mức giảm" min=0 max=100>
                            </div>
                            <div>
                                <label>Danh sách sản phẩm được áp dụng</label>
                                <div class="mb-3 space-y-3" id="listProduct">
                                    <div id="product" class="flex items-center">
                                        <select name="products[]" class="w-full py-2 px-3 mt-1 border focus:ring-gray-700 focus:ring-2 transition-all outline-none">
                                            <option selected disabled>Chọn sản phẩm</option>
                                            <?php foreach ($products as $product) { ?>
                                            <option value="<?= $product['MaSP'] ?>"><?= $product['TenSP'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <button class="ml-3 bg-red-400 hover:bg-red-500 w-10 h-9 py-1 my-auto grid place-items-center m-auto transition-all text-white block" id="deleteProduct">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <button class="text-xs py-2 px-3 bg-gray-500 hover:bg-gray-600 transition-all text-gray-50 flex items-center space-x-2" id="addProduct">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Thêm sản phẩm</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-span-2 space-y-3 pl-4">
                            <div>
                                <label>Thời gian bắt đầu</label>
                                <input type="date" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" placeholder="0" min=1>
                            </div>
                            <div>
                                <label>Thời gian kết thúc</label>
                                <input type="date" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" placeholder="0" min=1>
                            </div>
                        </div>
                    </div>
                </main>
            </form>
        </div>
    </div>
    <script src="<?= BASE_URL ?>/public/admin/addDiscount.js"></script>
</body>

</html>