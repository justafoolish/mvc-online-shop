<?php require_once "./src/Views/Admin/Templates/navbar.php"; ?>
<?php
    $receipts = $data['receipts'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./src/Views/Admin/Templates/header.php" ?>
</head>

<body>
    <div class="relative min-h-screen flex">
        <!-- side bar -->
        <?php require_once "./src/Views/Admin/Templates/sidebar.php" ?>
        <!-- main content -->
        <div class="flex-1 px-10 mb-10">
            <?php getNavBar("Tồn kho"); ?>
            <main>
                <div class="flex justify-between py-5 mb-3">
                    <h3 class="font-semibold text-2xl">Tồn kho</h3>
                    <div class="flex space-x-3">
                        <a href="<?= BASE_URL ?>/ProductManage/UpdateInventory" class="flex items-center bg-gray-700 text-gray-200 text-xs px-3 py-2 hover:text-gray-100 hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>Tạo phiếu nhập
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="product_table" class="table table-borderless table-hover" width="100%" cellspacing="0">
                        <thead class="bg-gray-700 text-gray-50">
                            <tr class="grid grid-cols-11">
                                <th class="col-span-2">Mã phiếu nhập</th>
                                <th class="col-span-2">Ngày nhập</th>
                                <th class="col-span-2">Nhà cung cấp</th>
                                <th class="col-span-3">Nhân viên thực hiện</th>
                                <th class="col-span-2">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 4;
                            foreach ($receipts as $receipt) {
                            ?>
                                <tr class="grid grid-cols-11 text-center">
                                    <td class="col-span-2"><?= $receipt['MaPhieuNhap'] ?></td>
                                    <td class="col-span-2"><?= $receipt['NgayNhap'] ?></td>
                                    <td class="col-span-2"><?= $receipt['TenNhaCungCap'] ?></td>
                                    <td class="col-span-3"><?= $receipt['TenNhanVien'] ?></td>
                                    <td class="col-span-2"><?= number_format($receipt['TongTien'],0,",",".") ?><sup>đ</sup></td>
                                </tr>
                                <!-- <tr class="grid grid-cols-11">
                                    <td class="text-left col-span-5 flex items-center space-x-4">
                                        <div class="w-10">
                                            <img src="<?= BASE_URL ?>/public/images/products/<?= $product['Hinh1'] ?>" class="max-w-full h-auto object-center object-cover">
                                        </div>
                                        <a href="" class="text-gray-700 hover:text-gray-900 hover:underline transition-all"><?= $product['TenSP'] ?></a>
                                    </td>
                                    <td class="grid place-items-center"><?= $product['MaSP'] ?></td>
                                    <td class="grid place-items-center"><?= $product['MaSize'] ?></td>
                                    <td class="flex items-center justify-center">
                                        <span class="text-<?= $product['SoLuong'] < $minQuantity ? "yellow" : "green" ?>-500" id="current"><?= $product['SoLuong'] ?></span>
                                        <span class="flex text-green-500 hidden" id="new"></span>
                                    </td>
                                    <td class="flex items-center justify-center space-x-10 col-span-3">
                                        <div class="flex my-5 w-32 justify-between inline-block">
                                            <button class="px-3 py-2 bg-gray-300 text-gray-500 hover:text-gray-800" id="decrease">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                                </svg>
                                            </button>
                                            <input type="text" class="outline-none w-16 text-center border-t-2 border-b-2 border-gray-300 bg-white" min="0" value="0" id="quantity" name="quantity" />
                                            <button class="px-3 py-2 bg-gray-300 text-gray-500 hover:text-gray-800" id="increase">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                            </button>
                                        </div>
                                        <button class="text-gray-100 bg-gray-400 hover:bg-gray-600 transition-all px-3 py-1" id="updateQuantity" pid="<?= $product['MaSP'] ?>" size="<?= $product['MaSize'] ?>">Lưu</button>
                                    </td>
                                </tr> -->
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#product_table').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= BASE_URL ?>/public/admin/updateInventory.js?v=2"></script>
</body>

</html>