<!DOCTYPE html>
<html lang="en">
<?php
$customer = $data['customerLogin'];
$orders = $data['orders'];
?>

<head>
    <?php require_once "./src/Views/Templates/head.php"; ?>
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
                <h2 class="my-6 text-5xl font-bold text-gray-700">Chi tiết đơn hàng</h2>
                <div class="border-b w-2/4 py-3">
                    <div class="flex items-center ">
                        <h4 class="font-medium text-lg text-gray-600 mr-2">Mã đơn hàng: </h4>
                        <h4 class="text-lg"><?= $orders['MaHoaDon']; ?></h4>
                    </div>
                    <div class="text-lg flex">
                        <h4 class="font-medium text-lg text-gray-600 mr-2">Ngày đặt: </h4>
                        <h4 class="text-lg"><?= $orders['NgayTao'];?></h4>
                    </div>
                </div>
                <div class="my-4 border-8 p-3 w-1/2">
                    <div class="">
                    <div class="grid grid-cols-10">
                            <div class="bg-gray-50 col-span-3 text-center"></div>
                            <div class="bg-gray-50 py-2 text-gray-700 font-medium text-center">SL</div>
                            <div class="bg-gray-50 py-2 text-gray-700 font-medium col-span-2 text-center">Giá</div>
                            <div class="bg-gray-50 py-2 text-gray-700 font-medium col-span-2 text-center">Chiết Khấu</div>
                            <div class="bg-gray-50 py-2 text-gray-700 font-medium col-span-2 text-center">Thành tiền</div>
                        </div>
                        <div>
                            <?php
                            // $count = 0;
                            // $total = 0;
                            // $subTotal = 0;
                            // foreach ($detail as $product) {
                            // $subTotal += intval($product['DonGia'])*intval($product['SoLuong']);  
                            // $total += $subTotal;
                            // $count += $product['SoLuong'];
                            foreach($data['details'] as $orderDetail) {
                            ?>
                                <div class="grid grid-cols-10">
                                    <div class="col-span-3 p-2 flex">
                                        <div class="w-14">
                                            <img class="max-w-full" src="<?= BASE_URL ?>/public/images/products/<?= $orderDetail['Hinh1'] ?>" alt="">
                                        </div>
                                        <div class="pl-2 pt-2">
                                            <a href="<?= BASE_URL ?>/Product/ID/<?= $orderDetail['MaSP'] ?>"><h3 class="font-medium"><?= $orderDetail['TenSP'] ?></h3></a>
                                            <h3>Size: <?= $orderDetail['MaSize'] ?></h3>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center"><?= $orderDetail['SoLuong'] ?></div>
                                    <div class="col-span-2 justify-center flex items-center"><?= number_format($orderDetail['DonGia'], 0, ",", ".") ?><sup>đ</sup></div>
                                    <div class="col-span-2 flex items-center justify-center"><?= $orderDetail['ChietKhau']?>%</div>
                                    <?php 
                                        $price = $orderDetail['DonGia'] - ($orderDetail['DonGia'] * ($orderDetail['ChietKhau'] * (1/100))); //tru chiet khau
                                        $price = $orderDetail['SoLuong'] * $price; // nhan theo so luong
                                    ?>
                                    <div class="flex items-center col-span-2 justify-center"><?= number_format( $price, 0, ",", ".") ?><sup>đ</sup></div>
                                </div>

                            <?php } ?>
                            <div class="grid grid-cols-8 border-t">
                                <div class="col-span-2 col-start-5 text-center font-medium">
                                    Tổng tiền:
                                </div>
                                <div class="text-center col-span-2">
                                <?= number_format($orders['TongTien'], 0, ",", ".") ?><sup>đ</sup>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 w-1/3">
                    <div class="border-b px-4 py-2 bg-gray-200">
                        <span class="font-medium">
                            Thông tin thanh Toán:
                        </span>
                        <span>
                            <?= $orders['TrangThaiThanhToan'] ? "Đã thanh toán" : "Chưa thanh toán" ?>
                        </span>
                    </div>
                    <div class="border px-4 py-2">
                        <h3 class="font-medium">
                            Thông tin giao hàng:
                        </h3>
                        <h3><?= $customer['TenKhachHang'] ?></h3>
                        <h3><?= $customer['SDT'] ?></h3>
                        <h3><?= $customer['DiaChi'] ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "./src/Views/Templates/sidebar.php" ?>
    <script src="<?= BASE_URL ?>/public/scripts/form.js?v=4"></script>
</body>

</html>