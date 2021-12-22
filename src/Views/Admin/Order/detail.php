<?php require_once "./src/Views/Admin/Templates/navbar.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php
    $order = $data['order'];
    $detail = $data['detail'];
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
            <?php getNavBar("Thông tin đơn hàng"); ?>
            <main>
                <div class="py-2 mt-3 flex divide-gray-400 divide-x space-x-3">
                    <div class="">
                        <div class="text-gray-500 font-medium">Mã</div>
                        <div class="text-2xl font-semibold"><?= $order['MaHoaDon'] ?></div>
                    </div>
                    <div class="pl-3">
                        <div class="text-gray-500 font-medium">Trạng thái thanh toán</div>
                        <div class="text-<?= intval($order['TrangThaiThanhToan']) ? "green" : "yellow" ?>-500 font-medium text-2xl"><?= intval($order['TrangThaiThanhToan']) ? "Đã thanh toán" : "Chưa thanh toán" ?></div>
                    </div>
                </div>
                <p class="block mb-6">19/11/2021 17:22 CH</p>
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-3 shadow rounded">
                        <h3 class="font-bold p-3 text-lg text-gray-800 border-b">Danh sách sản phẩm đặt mua</h3>
                        <div class="grid grid-cols-10">
                            <div class="bg-gray-50 text-sm col-span-4"></div>
                            <div class="bg-gray-50 text-sm py-2 text-gray-700 font-medium">Số lượng</div>
                            <div class="bg-gray-50 text-sm py-2 text-gray-700 font-medium col-span-2 text-center">Giá</div>
                            <div class="bg-gray-50 text-sm py-2 text-gray-700 font-medium col-span-2 text-center">Chiết Khấu</div>
                            <div class="bg-gray-50 text-sm py-2 text-gray-700 font-medium ">Thành tiền</div>
                        </div>    
                        <div> 
                            <?php 
                            $count=0; 
                            $total=0;
                            $subTotal=0;   
                            $discount=0; 
                            $preDiscount=0;
                            foreach ($detail as $product) {
                                $preDiscount += intval($product['DonGia'])*intval($product['SoLuong']);
                                $subTotal = intval($product['DonGia'])*intval($product['SoLuong'])*(1 - intval($product['ChietKhau'])/100);
                                $discount += $preDiscount*(intval($product['ChietKhau'])/100);
                                $total += $subTotal;
                                $count += $product['SoLuong'];
                            ?>
                            <div class="grid grid-cols-10">
                            <div class="col-span-4 p-2 flex">
                                <div class="w-14">
                                    <img class="max-w-full" src="<?= BASE_URL ?>/public/images/products/<?= $product['Hinh1'] ?>" alt="">
                                </div>
                                <div class="pl-2 pt-2">
                                    <h3 class="font-medium"><?= $product['TenSP'] ?></h3>
                                    <h3>Size: <?= $product['MaSize'] ?></h3>
                                </div>
                            </div>
                            <div class="flex items-center justify-center"><?= $product['SoLuong'] ?></div>
                            <div class="col-span-2 justify-center flex items-center"><?= number_format($product['DonGia'],0,",",".") ?><sup>đ</sup></div>
                            <div class="col-span-2 justify-center flex items-center"><?= $product['ChietKhau'] ?>%</div>
                            <div class="flex items-center"><?= number_format($subTotal,0,",",".") ?><sup>đ</sup></div>
                        </div>
                        <?php } ?>
                        </div>
                        <?php if(!$order['TrangThaiThanhToan']) { ?>
                        <div class="col-span-8 border-t px-4 py-3 flex">
                            <a href="<?= BASE_URL ?>/OrderManage/ConfirmOrder/<?= $order['MaHoaDon'] ?>" class="bg-gray-500 hover:bg-gray-600 transition-all text-white px-3 py-2 ml-auto">Xác nhận đã thanh toán</a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="">
                        <div class="shadow rounded">
                        <h3 class="font-bold py-3 px-4 text-lg text-gray-800 border-b">Thông tin người mua</h3>
                            <div class="px-4 py-2">
                                <a href="" class="py-3 text-lg"><?= $order['TenKhachHang'] ?></a>
                                <div class="flex justify-between my-1">
                                    <span class="">SDT</span>
                                    <span class="font-bold"><?= $order['SDT'] ?></span>
                                </div>
                            </div>
                            <div class="border-t">
                                <h3 class="font-bold py-2 px-4 text-lg text-gray-800">Địa chỉ giao hàng</h3>
                                <p class="px-4"><?= $order['DiaChiGiaoHang'] ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-3 shadow rounded mb-10">
                        <h3 class="font-bold p-3 text-lg text-gray-800 border-b">Thông tin thanh toán</h3>
                        <div class="grid grid-cols-2 gap-3 p-3">
                            <div>Số lượng sản phẩm</div>
                            <div><?= $count ?></div>
                            <div>
                                Tổng tiền hàng
                            </div>
                            <div>
                            <?= number_format($preDiscount,0,",",".") ?><sup>đ</sup>
                            </div>
                            <div>Giảm giá sản phảm</div>
                            <div><?= number_format($discount,0,",",".") ?><sup>đ</sup></div>
                            <div>Mã Giảm Giá (<?= $order['MaGiamGia'] ? $order['MaGiamGia'] : "#" ?>)</div>
                            <div> <?= number_format($total*(intval($order['ChietKhau'])/100),0,",",".") ?><sup>đ</sup></div>
                            <div class="font-bold">Tổng giá trị đơn hàng</div>
                            <div><?= number_format($total*(1 - intval($order['ChietKhau'])/100),0,",",".") ?><sup>đ</sup></div>
                            <div>Đã thanh toán</div>
                            <div><?= $order['TrangThaiThanhToan'] ? number_format($total*(1 - intval($order['ChietKhau'])/100),0,",",".") : 0 ?><sup>đ</sup></div>
                        </div>
                    </div>
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