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
        <div class="flex-1 px-10">
            <?php getNavBar("Thông tin đơn hàng"); ?>
            <main>
                <div class="py-2 mt-3 flex divide-gray-400 divide-x space-x-3">
                    <div class="">
                        <div class="text-gray-500 font-medium">Mã</div>
                        <div class="text-2xl font-semibold">#222323</div>
                    </div>
                    <div class="pl-3">
                        <div class="text-gray-500 font-medium">Trạng thái thanh toán</div>
                        <div class="text-green-500 font-medium text-2xl">Đã thanh toán</div>
                    </div>
                </div>
                <p class="block mb-6">19/11/2021 17:22 CH</p>
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-3 shadow rounded">
                        <h3 class="font-bold p-3 text-lg text-gray-800 border-b">Danh sách sản phẩm đặt mua</h3>
                        <div class="grid grid-cols-8">
                            <div class="bg-gray-50 text-sm col-span-4"></div>
                            <div class="bg-gray-50 text-sm py-2 text-gray-700 font-medium">Số lượng</div>
                            <div class="bg-gray-50 text-sm py-2 text-gray-700 font-medium col-span-2 text-center">Giá</div>
                            <div class="bg-gray-50 text-sm py-2 text-gray-700 font-medium ">Thành tiền</div>
                            
                            <div class="col-span-4 p-2 flex">
                                <div class="w-14">
                                    <img class="max-w-full" src="<?= BASE_URL ?>/public/images/products/ao1.jpeg" alt="">
                                </div>
                                <div class="pl-2">
                                    <h3>Áo ABC XYZ</h3>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">3</div>
                            <div class="col-span-2 justify-center flex items-center">150.000<sup>đ</sup></div>
                            <div class="flex items-center">450.000<sup>đ</sup></div>

                        </div>
                    </div>
                    <div class="">
                        <div class="shadow rounded">
                        <h3 class="font-bold py-3 px-4 text-lg text-gray-800 border-b">Thông tin người mua</h3>
                            <div class="px-4">
                                <a href="" class="my-2">Khắc Tuấn</a>
                                <div class="flex justify-between my-1">
                                    <span class="">Đã đặt</span>
                                    <span class="font-bold">27 đơn hàng</span>
                                </div>
                                <div class="flex justify-between my-1">
                                    <span class="">Doanh thu tích lũy</span>
                                    <span class="font-bold">123.000 <sup>đ</sup></span>
                                </div>
                            </div>
                            <div class="border-t">
                                <h3 class="font-bold py-2 px-4 text-lg text-gray-800">Địa chỉ giao hàng</h3>
                                <p class="px-4">80, 79Str D7 HCMC</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-3 shadow rounded mb-10">
                        <h3 class="font-bold p-3 text-lg text-gray-800 border-b">Thông tin thanh toán</h3>
                        <div class="grid grid-cols-2 gap-3 p-3">
                            <div>Số lượng sản phẩm</div>
                            <div>6</div>
                            <div>
                                Tổng tiền hàng
                            </div>
                            <div>
                                1,500,000 ₫
                            </div>
                            <div>Giảm giá</div>
                            <div>0 ₫</div>
                            <div>Vận chuyển</div>
                            <div>0 ₫</div>
                            <div class="font-bold">Tổng giá trị đơn hàng</div>
                            <div>1,500,000 ₫</div>
                            <div>Đã thanh toán</div>
                            <div>1,500,000 ₫</div>

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