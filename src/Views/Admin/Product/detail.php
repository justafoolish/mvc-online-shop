<?php require_once "./src/Views/Admin/Templates/navbar.php"; ?>
<!DOCTYPE html>
<?php 
    $product = $data['product'];
    $categories = $data['categories'];
    $variants = $data['variant'];
?>
<html lang="en">

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
                    <a class="text-xs py-2 px-5 bg-red-500 hover:bg-red-600 transition-all text-gray-50" href="">Xoá</a>
                    <button class="text-xs py-2 px-5 bg-blue-500 hover:bg-blue-600 transition-all text-gray-50" type="submit">Cập nhật</button>
                </header>
                <main class="px-10 mt-5">
                    <h3 class="font-semibold text-2xl border-b pb-2">Thông tin sản phẩm</h3>
                    <div class="grid grid-cols-6 mt-2 gap-4">
                        <div class="col-start-2 col-span-4 space-y-3">
                            <div>
                                <label>Tên sản phẩm</label>
                                <input type="text" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" placeholder="Nhập tên sản phẩm" value="<?= $product['TenSP'] ?>">
                            </div>
                            <div>
                                <label for="">Danh mục</label>
                                <select name="category" class="w-full py-2 px-3 mt-1 border focus:ring-gray-700 focus:ring-2 transition-all outline-none">
                                    <option selected disabled>Chọn danh mục sản phẩm</option>
                                    <?php 
                                        foreach($categories as $cat) {
                                    ?>
                                    <option value="<?= $cat['MaDanhMuc'] ?>" <?= $cat['MaDanhMuc'] == $product['DanhMuc'] ? "selected" : ""?>><?= $cat['TenDanhMuc'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <label>Hình ảnh</label>
                                <div class="relative mb-2 border w-full px-3 py-2 focus:ring-gray-700 focus:ring-2 transition-all ">
                                    <input type="file" name="image[]" class="outline-none w-11/12">
                                    <button class="bg-red-400 hover:bg-red-500 w-10 h-10 grid place-items-center m-auto transition-all text-white dlt-btn absolute inset-y-0 right-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="relative border w-full px-3 py-2 focus:ring-gray-700 focus:ring-2 transition-all">
                                    <input type="file" name="image[]" class="outline-none w-11/12">
                                    <button class="bg-red-400 hover:bg-red-500 w-10 h-10 grid place-items-center m-auto transition-all text-white dlt-btn absolute inset-y-0 right-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="grid grid-cols-7 border my-4">
                                    <div class="col-start-2 col-span-2">
                                        <img src="<?= BASE_URL ?>/public/images/products/<?= $product['Hinh1'] ?>" alt="">
                                    </div>
                                    <div class="col-start-5 col-span-2">
                                        <img src="<?= BASE_URL ?>/public/images/products/<?= $product['Hinh2'] ?>" alt="">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 hidden">
                                    <div class="h-10">
                                        <img src="" alt="" class="max-w-full h-auto preview">
                                    </div>
                                    <div class="h-10">
                                        <img src="" alt="" class="max-w-full h-auto preview">
                                    </div>
                                </div>
                            </div>
                            <!-- <div id="listVariant">
                                <label id="variantLabel">Biến thể</label>
                                <?php //foreach ($variants as $var) {?>
                                <div class="grid grid-cols-3 gap-5 mb-3" id="variantSelectBox">
                                    <select name="variant[]" class="w-full py-2 px-3 mt-1 border focus:ring-gray-700 focus:ring-2 transition-all outline-none">
                                        <option selected disabled>Chọn kích thước</option>
                                        <option value="M" <?= $var['MaSize'] == "M" ? "selected" : ""?>>M</option>
                                        <option value="L" <?= $var['MaSize'] == "L" ? "selected" : ""?>>L</option>
                                        <option value="XL" <?= $var['MaSize'] == "XL" ? "selected" : ""?>>XL</option>
                                    </select>
                                    <div class="col-span-2 relative border w-full px-3 py-2 focus:ring-gray-700 focus:ring-2 transition-all">
                                        <input type="number" class="w-full outline-none text-center" min="0" placeholder="Nhập Số lượng" name="variantValue[]" value="<?= $var['SoLuong'] ?>">
                                        <button class="bg-red-400 hover:bg-red-500 w-10 h-10 grid place-items-center m-auto transition-all text-white absolute inset-y-0 right-1" id="deleteVariant">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <?php //} ?>
                            </div> -->
                            <a href="<?= BASE_URL ?>/ProductManage/Inventory/" class="text-xs py-2 px-3 bg-gray-500 hover:bg-gray-600 transition-all text-gray-50 items-center space-x-2 inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Cập nhật số lượng</span>
                            </a>
                            <div>
                                <label>Giá thành (vnđ)</label>
                                <input type="number" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" min="0" step="10000" required placeholder="Nhập giá thành" value="<?= $product['DonGia'] ?>">
                            </div>
                            <div>
                                <label>Khuyến mãi (%)</label>
                                <input type="number" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" min="0" max="100" required placeholder="Nhập mức giảm" value="<?= $product['ChietKhau'] ?>">
                            </div>
                            <div>
                                <label>Miêu tả</label>
                                <textarea rows="5" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none"></textarea>
                            </div>
                        </div>
                    </div>
                </main>
            </form>
        </div>
    </div>
    <script src="<?= BASE_URL ?>/public/admin/addProduct.js?v=1"></script>
</body>

</html>