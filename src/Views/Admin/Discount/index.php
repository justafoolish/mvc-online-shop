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
        <div class="flex-1 px-10 mb-10">
            <?php getNavBar("Danh sách khuyến mãi"); ?>
            <main>
                <div class="flex justify-between py-5 mb-3">
                    <h3 class="font-semibold text-2xl">Danh sách khuyến mãi</h3>
                    <div class="flex space-x-3">
                        <a href="auto_add.php" class="flex items-center bg-gray-700 text-gray-200 text-xs px-3 py-2 hover:text-gray-100 hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>Tạo danh sách sản phẩm khuyến mãi
                        </a>
                        <a href="add.php" class="flex items-center bg-gray-700 text-gray-200 text-xs px-3 py-2 hover:text-gray-100 hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>Tạo mã khuyến mãi
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="discount_table" class="table table-borderless table-hover" width="100%" cellspacing="0">
                        <thead class="bg-gray-700 text-gray-50">
                            <tr>
                                <th>Chi tiết</th>
                                <th>Sử dụng</th>
                                <th>Bắt đầu</th>
                                <th>Kết thúc</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 3;
                            while ($i-- > 0) { ?>
                                <tr class="text-sm">
                                    <td class="text-left">
                                        <p>
                                            <span class="text-green-500">Mã khuyến mãi:</span>
                                            <span class="font-semibold">
                                                0WTX9IZFTB5H
                                            </span>
                                        </p>
                                        <p>Giảm 5% cho tất cả đơn hàng</p>
                                        <p class="font-medium italic">(Mã khuyến mãi có thể sử dụng chung với chương trình khuyến mãi)</p>
                                    </td>
                                    <td class="text-center">0</td>
                                    <td>18/11/2021</td>
                                    <td>18/12/2021</td>
                                </tr>
                            <?php  } ?>
                            <?php $i = 3;
                            while ($i-- > 0) { ?>
                                <tr class="text-sm">
                                    <td class="text-left">
                                        <p class="text-blue-500">
                                            Khuyến mãi sản phẩm
                                        </p>
                                        <p>Giảm 5% cho sản phẩm <a href="" class="text-blue-700 underline hover:text-blue-600">Áo Len</a> </p>
                                    </td>
                                    <td class="text-center">0</td>
                                    <td>18/11/2021</td>
                                    <td>18/12/2021</td>
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
            $('#discount_table').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="../script/index.js"></script>
</body>

</html>