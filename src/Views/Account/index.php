<!DOCTYPE html>
<html lang="en">
<?php
$customer = $data['customerLogin'];
?>

<head>
    <?php require_once "./src/Views/Templates/head.php"; ?>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/styles/bootstrap.datatable.css">
</head>

<body>
    <?php require_once "./src/Views/Templates/header.php" ?>
    <div class="flex">
        <?php
        require_once "./src/Views/Templates/navbar.php";
        getNavBar($data['collections']);
        ?>
        <div class="flex-1 px-5">
            <div class="w-full">
                <h2 class="my-6 text-5xl font-bold text-gray-700">Tài khoản của bạn</h2>
                <h4 class="block border-b w-2/3 py-3 font-medium text-lg text-gray-600">Thông tin tài khoản</h4>
                <div class="mb-5">
                    <h3 class="text-lg mt-1 text-gray-800"><?= $customer['TenKhachHang'] ?></h3>
                    <h3 class="text-base text-gray-700"><?= $customer['Email'] ?></h3>
                    <h3 class="text-base text-gray-700"><?= $customer['DiaChi'] ?></h3>
                </div>
                <div class="my-4 w-2/3 border-8 p-3">
                    <?php if(0) { ?>
                    <div class=" text-gray-700">
                        Bạn chưa mua sản phẩm
                    </div>
                    <?php } else { ?>
                    <div class="table-responsive">
                        <table id="order_table" class="table table-borderless table-hover" width="100%" cellspacing="0">
                            <thead class="bg-gray-200 text-gray-800">
                                <tr class="grid grid-cols-4">
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Thành tiền</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data['orders'] as $orders) { ?>
                                    <tr class="grid grid-cols-4">
                                        <td class="text-center">
                                            <a href="<?= BASE_URL ?>/Account/ViewOrder/<?= $orders['MaHoaDon'] ?>" class="text-gray-900 hover:text-blue-500 hover:underline transition-all"><?= $orders['MaHoaDon'] ?></a>
                                        </td>
                                        <td class="text-center"><?= $orders['NgayTao'] ?></td>
                                        <td class="text-center">
                                            <span>
                                                <?= number_format($orders['TongTien'], 0, ",", ".") ?><sup>đ</sup>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <?= $orders['TrangThaiThanhToan'] ? "Đã thanh toán" : "Chưa thanh toán" ?>
                                        </td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "./src/Views/Templates/sidebar.php" ?>
    <script>
        $(document).ready(function() {
            $('#order_table').DataTable({
                "searching": false,
                "info": false,
                "bLengthChange": false
                // "ordering":false
            });
        });
    </script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= BASE_URL ?>/public/scripts/form.js?v=4"></script>
</body>

</html>