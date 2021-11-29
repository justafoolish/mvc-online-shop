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
                    <a class="text-xs py-2 px-5 bg-gray-500 hover:bg-gray-600 transition-all text-gray-50" href="../Category">Huỷ</a>
                    <button class="text-xs py-2 px-5 bg-blue-500 hover:bg-blue-600 transition-all text-gray-50" type="submit">Cập nhật</button>
                </header>
                <main class="px-10 mt-5">
                    <h3 class="font-semibold text-2xl border-b pb-2 inline-block">Thông tin danh mục</h3>
                    <div class="grid grid-cols-6 mt-2 gap-4">
                        <div class="col-start-1 col-span-4 space-y-3">
                            <div>
                                <label>Tên danh mục</label>
                                <input type="text" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" placeholder="Nhập tên danh mục">
                            </div>
                            <div>
                                <label>Miêu tả</label>
                                <textarea rows="5" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none"></textarea>
                            </div>
                        </div>
                    </div>

                    <h3 class="font-semibold text-2xl border-b pb-2 mt-7 inline-block">Danh sách sản phẩm</h3>
                    <div class="grid grid-cols-6 mt-2 gap-4">
                        <div class="col-span-4 space-y-3">
                            <?php $i = 5;
                            while ($i-- > 0) { ?>
                                <div class="flex space-x-3 border-b border-gray-300 pb-3">
                                    <div class="w-10 min-w-10">
                                        <img src="../../image/107824882_303977137640006_5725713926320775589_n.jpg" class="max-w-full">
                                    </div>
                                    <div class="flex items-center font-medium">
                                        Áo ABC XYZ Lorem ipsum dolor sit am
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <h3 class="col-span-4 text-right font-medium">Tổng có 5 sản phẩm</h3>
                    </div>

                </main>
            </form>
        </div>
    </div>
    <script src="../script/index.js"></script>
</body>

</html>