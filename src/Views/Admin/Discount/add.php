<?php include "../Component/navbar.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../Component/header.php" ?>
</head>

<body>
    <div class="relative min-h-screen flex">
        <!-- side bar -->
        <?php include "../Component/sidebar.php" ?>
        <!-- main content -->
        <div class="flex-1 mb-10">
            <form action="index.php" method="post">
                <header class='flex justify-end items-center py-4 sticky top-0 inset-x-0 bg-white z-10 shadow-lg px-10 space-x-3'>
                    <a class="text-xs py-2 px-5 bg-gray-500 hover:bg-gray-600 transition-all text-gray-50" href="../Discount">Huỷ</a>
                    <button class="text-xs py-2 px-5 bg-blue-500 hover:bg-blue-600 transition-all text-gray-50" type="submit">Lưu</button>
                </header>
                <main class="px-10 mt-5">
                    <h3 class="font-semibold text-2xl border-b pb-2">Tạo khuyến mãi</h3>
                    <div class="grid grid-cols-6 mt-2 gap-4 divide-gray-400 divide-x">
                        <div class="col-span-4 space-y-3">
                            <div>
                                <div class="flex justify-between">
                                    <label>Mã khuyến mãi</label>
                                    <button class="text-blue-500 text-sm">Tạo mã tự động</button>
                                </div>
                                <input type="text" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" placeholder="Nhập mã khuyến mãi">
                                <h3 class="text-gray-400 text-sm italic">Khách hàng nhập mã khuyến mãi khi thực hiện thanh toán</h3>
                            </div>
                            <div>
                                <label>Mức giảm (%)</label>
                                <input type="number" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" placeholder="Nhập mức giảm" min=0 max=100>
                            </div>
                        </div>
                        <div class="col-span-2 space-y-3 pl-4">
                            <div>
                                <label>Giới hạn số lần</label>
                                <input type="number" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" placeholder="0" min=1>
                            </div>
                            <div>
                                <label>Thời gian bắt đầu</label>
                                <input type="date" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" placeholder="0" min=1>
                            </div>
                            <div>
                                <label>Thời gian kết thúc</label>
                                <input type="date" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" placeholder="0" min=1>
                            </div>
                        </div>
                    </div>
                </main>
            </form>
        </div>
    </div>
    <script src="../script/index.js"></script>
</body>

</html>