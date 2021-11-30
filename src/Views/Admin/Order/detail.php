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
                <p class="block mb-10">19/11/2021 17:22 CH</p>
                <div>
                </div>

            </main>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#product_table').DataTable();
        });
    </script>
    <script /src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>