<?php require_once "./src/Views/Admin/Templates/navbar.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php 
    $employees = $data['employees'];
?>
<head>
    <?php require_once "./src/Views/Admin/Templates/header.php" ?>
</head>

<body>
    <div class="relative min-h-screen flex">
        <!-- side bar -->
        <?php require_once "./src/Views/Admin/Templates/sidebar.php" ?>
        <!-- main content -->
        <div class="flex-1 px-10 mb-10">
            <?php getNavBar("Danh sách nhân viên"); ?>
            <main>
                <div class="flex justify-between py-5 mb-3">
                    <h3 class="font-semibold text-2xl">Danh sách nhân viên</h3>
                    <div class="flex space-x-3">
                        <a href="<?=BASE_URL?>/EmployeeManage/FormAdd" class="flex items-center bg-gray-700 text-gray-200 text-xs px-3 py-2 hover:text-gray-100 hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>Tạo nhân viên
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="product_table" class="table table-borderless table-hover" width="100%" cellspacing="0">
                        <thead class="bg-gray-700 text-gray-50">
                            <tr>
                                <th>Nhân Viên</th>
                                <th>Chức vụ</th>
                                <th>Email</th>
                                <th>SDT</th>
                                <th>Địa chỉ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($employees as $employee) { ?>
                                <tr>
                                    <td class="text-left flex items-center"><?= $employee['TenNhanVien'] ?></td>
                                    <td class="text-center"><?= $employee['ChucVu'] ?></td>
                                    <td class=""><?= $employee['Email'] ?></td>
                                    <td class="text-center"><?= $employee['SDT'] ?></td>
                                    <td class="text-center"><?= $employee['DiaChi'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#product_table').DataTable({
                // "searching": false,
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