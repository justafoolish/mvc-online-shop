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
            <?php getNavBar("Danh sách đơn hàng"); ?>
            <main>
                <div class="flex justify-between py-5 mb-3">
                    <h3 class="font-semibold text-2xl">Danh sách đơn hàng</h3>
                    <div class="flex space-x-3">
                        <!-- <button class="flex items-center bg-gray-700 text-gray-200 text-xs px-3 py-2 hover:text-gray-100 hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>Tạo hoá đơn
                        </button> -->
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="product_table" class="table table-borderless table-hover" width="100%" cellspacing="0">
                        <thead class="bg-gray-700 text-gray-50">
                            <tr>
                                <th>Mã</th>
                                <th>Ngày tạo</th>
                                <th>Khách hàng</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 30;
                            foreach ($data['order'] as $orders) { ?>
                                <tr>
                                    <td>
                                        <a href="<?= BASE_URL ?>/OrderManage/OrderDetail/<?= $orders['MaHoaDon'] ?>" class="text-blue-600 hover:text-blue-800"><?= $orders['MaHoaDon'] ?></a>
                                    </td>
                                    <td class="text-center">
                                        <?= $orders['NgayTao'] ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>/CustomerManage/ViewDetail/<?= $orders['MaKhachHang'] ?>" class="text-blue-600 hover:text-blue-800">
                                            <?= $orders['TenKhachHang'] ?>
                                        </a>
                                    </td>
                                    <td class="text-center text-<?= intval($orders['TrangThaiThanhToan']) ? "green" : "yellow" ?>-500">
                                        <?= intval($orders['TrangThaiThanhToan']) ? "Đã thanh toán" : "Chưa thanh toán" ?>
                                    </td>
                                    <td class="text-center">
                                        <?= number_format($orders['TongTien'],0,",",".") ?><sup>đ</sup>
                                    </td>
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
            $('#product_table').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>