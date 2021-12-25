<?php require_once "./src/Views/Admin/Templates/navbar.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php
    $products = $data['products'];
    $employee = $data['employee'];
    $sups = $data['sups'];
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
            <form action="<?= BASE_URL ?>/ProductManage/CreateInventoryReceipt" method="post">
                <header id="header" class="flex justify-end items-center py-4 sticky top-0 inset-x-0 bg-white z-10 shadow-lg px-10 space-x-3 relative">
                    <a class="text-xs py-2 px-5 bg-gray-500 hover:bg-gray-600 transition-all text-gray-50" href="../ProductManage/Inventory">Huỷ</a>
                    <button class="text-xs py-2 px-5 bg-blue-500 hover:bg-blue-600 transition-all text-gray-50" type="submit" name="submit">Lưu</button>
                    
                </header>
                <main class="px-10 mt-5 relative">
                    <h3 class="font-semibold text-2xl border-b pb-2">Tạo phiếu nhập</h3>
                    <div class="grid grid-cols-6 mt-2 gap-4 divide-gray-400 divide-x">
                        <div class="col-span-4 space-y-3">
                            <div class="space-y-3">
                                <div>
                                    <label>Chọn sản phẩm nhập</label>
                                    <select id="product-list" class="w-full py-2 px-3 mt-1 border focus:ring-gray-700 focus:ring-2 transition-all outline-none">
                                        <option selected disabled>Chọn sản phẩm</option>
                                        <?php foreach ($products as $product) { ?>
                                            <option value="<?= $product['MaSP'] ?>" quantity="<?= $product['SoLuong'] ?>" size="<?= $product['MaSize'] ?>"><?= $product['TenSP'] . " - " . $product['MaSize'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="grid grid-cols-3 gap-5">
                                    <div class="col-span-2">
                                        <div>
                                            <label>Số lượng:
                                                <span class="inline-flex mt-auto items-end">
                                                    <span class="mr-1">(Tồn</span>
                                                    <span id="inv" class="text-yellow-500">0</span>
                                                    <span class="flex text-green-500" id="new"></span>)
                                                </span>
                                            </label>
                                            <input id="updateQuantity" type="number" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" min=1>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <label>Đơn giá nhập:</label>
                                            <input id="price" type="number" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" min=10000>
                                        </div>
                                    </div>
                                </div>
                                <button id="add" class="text-xs mt-auto py-2 px-3 bg-gray-500 hover:bg-gray-600 transition-all text-gray-50 flex items-center space-x-2" id="addProduct">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Thêm sản phẩm</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-span-2 space-y-3 pl-4">
                            <div>
                                <label>Nhân viên thực hiện</label>
                                <input type="text" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" value="<?= $employee['TenNhanVien'] ?>" disabled>
                            </div>
                            <div>
                                <label>Chọn nhà cung cấp</label>
                                <select id="ncc" class="w-full py-2 px-3 mt-1 border focus:ring-gray-700 focus:ring-2 transition-all outline-none">
                                    <option selected disabled value="">Chọn nhà cung cấp</option>
                                    <?php foreach ($sups as $sup) { ?>
                                        <option value="<?= $sup['MaNhaCungCap'] ?>"><?= $sup['TenNhaCungCap'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <label>Ngày nhập</label>
                                <input type="date" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" value="<?= date('Y-m-d') ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <table class="table table-borderless table-hover" width="100%" cellspacing="0">
                            <thead class="text-center bg-gray-200">
                                <tr class="grid grid-cols-12">
                                    <td class="col-span-2">Mã sản phẩm</td>
                                    <td class="col-span-5">Tên sản phẩm</td>
                                    <td class="col-span-2">Số lượng</td>
                                    <td class="col-span-2">Đơn giá</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody id="table">
                                
                            </tbody>
                        </table>
                    </div>
                </main>
            </form>
        </div>
    </div>
    
    <script src="<?= BASE_URL ?>/public/admin/updateInventory.js?v=3"></script>
</body>

</html>