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
            <?php getNavBar("Danh sách khách hàng"); ?>
            <main>
                <div class="flex justify-between py-5 mb-3">
                    <h3 class="font-semibold text-2xl">Danh sách khách hàng</h3>
                    <!-- <div class="flex space-x-3">
                        <button class="flex items-center bg-gray-700 text-gray-200 text-xs px-3 py-2 hover:text-gray-100 hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>Tạo khách hàng
                        </button>
                    </div> -->
                </div>

                <div class="table-responsive">
                    <table id="product_table" class="table table-borderless table-hover" width="100%" cellspacing="0">
                        <thead class="bg-gray-700 text-gray-50">
                            <tr>
                                <th>Khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Tổng đơn hàng</th>
                                <!-- <th>Đơn hàng gần nhất</th> -->
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data['customer'] as $customers) { ?>
                                <tr>
                                    <td class="text-left flex items-center">
                                        <a href="<?= BASE_URL ?>/CustomerManage/ViewDetail/<?= $customers['MaKhachHang'] ?>" class="text-blue-600 hover:text-blue-700 hover:underline transition-all"><?= $customers['TenKhachHang'] ?></a>
                                    </td>
                                    <td class="text-center"><?= $customers['DiaChi'] ?></td>
                                    <td class="text-center"><?= $customers['TongDonHang'] ?></td>
                                    <!-- <td> 
                                        <a href="<?= BASE_URL ?>/OrderManage/OrderDetail/<?=$customers['NgayGanNhat'][1] ?>" class="text-blue-600 hover:text-blue-800"><?= $customers['NgayGanNhat'][0]?></a>
                                    </td> -->
                                    <td class="text-center">
                                        <span>
                                            <?= number_format($customers['TongTien'],0,",",".") ?><sup>đ</sup>
                                        </span>
                                    </td>
                                </tr>
                            <?php } ?>
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
</body>

</html>