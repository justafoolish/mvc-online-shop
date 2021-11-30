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
                        <button class="flex items-center bg-gray-700 text-gray-200 text-xs px-3 py-2 hover:text-gray-100 hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>Tạo hoá đơn
                        </button>
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
                            while ($i-- > 0) { ?>
                                <tr>
                                    <td>
                                        <a href="<?= BASE_URL ?>/Admin/Order/<?= 4 ?>" class="text-blue-600 hover:text-blue-800">#00001</a>
                                    </td>
                                    <td class="text-center">
                                        27/10/2021
                                    </td>
                                    <td class="text-center">
                                        <a href="" class="text-blue-600 hover:text-blue-800">Hắc Tún</a>
                                    </td>
                                    <td class="text-center text-yellow-500">
                                        Chưa thanh toán
                                    </td>
                                    <td class="text-center">
                                        1,300,000<sup>đ</sup>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="<?= BASE_URL ?>/Admin/Order/<?= 4 ?>" class="text-blue-600 hover:text-blue-800">#000201</a>
                                    </td>
                                    <td class="text-center">
                                        23/10/2021
                                    </td>
                                    <td class="text-center">
                                        <a href="" class="text-blue-600 hover:text-blue-800">Hắc Tún</a>
                                    </td>
                                    <td class="text-center text-green-500">
                                        Đã thanh toán
                                    </td>
                                    <td class="text-center">
                                        300,000<sup>đ</sup>
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