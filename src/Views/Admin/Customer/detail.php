<?php require_once "./src/Views/Admin/Templates/navbar.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php 
    $orders = $data['orders'];
    $customer = $data['customer'];
?>
<head>
    <?php require_once "./src/Views/Admin/Templates/header.php" ?>
</head>

<body>
    <div class="relative min-h-screen flex">
        <!-- side bar -->
        <?php require_once "./src/Views/Admin/Templates/sidebar.php" ?>
        <!-- main content -->
        <div class="flex-1 px-10">
            <?php getNavBar("Khách hàng"); ?>
            <main>
                <h3 class="py-2 mt-3 mb-5 font-bold text-lg">
                    Thông tin khách hàng
                </h3>
                <div class="grid grid-cols-5 gap-4">
                    <div class="col-span-3 mb-5">
                        <div class="shadow rounded">
                            <h3 class="font-bold mx-3 pb-3 pt-3 text-base text-gray-700 border-b">Danh sách đơn hàng</h3>
                            <?php if(count($orders)): ?>
                            <div class="table-responsive px-3 pb-3">
                                <table id="order_table" class="table table-borderless table-hover" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td class="text-center bg-gray-50">Đơn hàng</td>
                                            <td class="text-center bg-gray-50">Ngày đặt</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($orders as $order): ?>
                                            <tr>
                                                <td>
                                                    <a href="<?= BASE_URL ?>/OrderManage/OrderDetail/<?= $order['MaHoaDon'] ?>" class="text-blue-500 hover:text-blue-400">Đơn hàng <?= $order['MaHoaDon'] ?></a>
                                                    <div>
                                                        <?= number_format($order['TongTien'],0,",",".") ?><sup>đ</sup>
                                                    </div>
                                                </td>
                                                <td class="text-right text-sm text-gray-500 align-center">
                                                    <?= $order['NgayTao'] ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php else: ?>
                                <div class="px-3 py-3 grid place-content-center text-red-500">
                                    Khách hàng chưa thực hiện mua hàng
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="shadow rounded px-3">
                            <h3 class="font-bold pb-3 pt-3 text-base text-gray-700 border-b">Thông tin liên hệ</h3>
                            <div class="py-2 text-sm">
                                <a href="" class="py-3 text-lg"><?= $customer['TenKhachHang'] ?></a>
                                <div class="flex justify-between my-1">
                                    <span class="">SDT</span>
                                    <span class="font-bold text-gray-700"><?= $customer['SDT'] ?></span>
                                </div>
                                <div class="flex justify-between my-1">
                                    <span class="">Email</span>
                                    <span class="font-bold text-gray-700"><?= $customer['Email'] ?></span>
                                </div>
                            </div>
                            <div class="border-t">
                                <h3 class="font-bold mb-1 pt-3 text-base text-gray-700">Địa chỉ mặc định</h3>
                                <p class="text-sm pb-3 text-gray-700"><?= $customer['DiaChi'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
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
</body>

</html>