<?php require_once "./src/Views/Admin/Templates/navbar.php"; ?>
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
            <?php getNavBar("Danh sách sản phẩm"); ?>
            <main>
                <div class="flex justify-between py-5 mb-3">
                    <h3 class="font-semibold text-2xl">Danh sách sản phẩm</h3>
                    <div class="flex space-x-3">
                        <!-- <button class="flex items-center bg-gray-700 text-gray-200 text-xs px-3 py-2 hover:text-gray-100 hover:bg-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>Nhập danh sách sản phẩm
                        </button> -->
                        <a class="flex items-center bg-gray-700 text-gray-200 text-xs px-3 py-2 hover:text-gray-100 hover:bg-gray-900" href="<?= BASE_URL ?>/ProductManage/FormInsert">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>Tạo sản phẩm
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="product_table" class="table table-borderless table-hover" width="100%" cellspacing="0">
                        <thead class="bg-gray-700 text-gray-50">
                            <tr class="grid grid-cols-4">
                                <th class="col-span-2">Tên Sản Phẩm</th>
                                <th>Biến thể</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data['products'] as $product) { ?>
                                <tr class="grid grid-cols-4">
                                    <td class="text-left col-span-2 flex items-center space-x-4">
                                        <div class="w-10">
                                            <img src="<?= BASE_URL ?>/public/images/products/<?= $product['Hinh1'] ?>" class="max-w-full h-auto object-center object-cover">
                                        </div>
                                        <a href="<?= BASE_URL ?>/ProductManage/Detail/<?= $product['MaSP'] ?>" class="text-gray-700 hover:text-gray-900 hover:underline transition-all"><?= $product['TenSP'] ?></a>
                                    </td>
                                    <td class="grid place-items-center">
                                        <span>
                                            <?= $product['MaSize'] ?>
                                        </span>
                                    </td>
                                    <td class="text-center"> <span class="text-<?= $product['SoLuong'] < 5 ? "yellow" : "green" ?>-500" id="current"><?= $product['SoLuong'] ?></span></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#product_table').DataTable({
                "info": false,
                "bLengthChange": false
            });
        });
    </script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>