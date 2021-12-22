<?php require_once "./src/Views/Admin/Templates/navbar.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php
    $profits = $data['profits'];
?>

<head>
    <?php require_once "./src/Views/Admin/Templates/header.php" ?>
    <script>
        function exportTableToExcel(tableID, filename = ''){
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
            
            // Specify file name
            filename = filename?filename+'.xls':'excel_data.xls';
            
            // Create download link element
            downloadLink = document.createElement("a");
            
            document.body.appendChild(downloadLink);
            
            if(navigator.msSaveOrOpenBlob){
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob( blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            
                // Setting the file name
                downloadLink.download = filename;
                
                //triggering the function
                downloadLink.click();
            }
    }
    </script>
</head>

<body>
    <div class="relative min-h-screen flex">
        <!-- side bar -->
        <?php require_once "./src/Views/Admin/Templates/sidebar.php" ?>
        <!-- main content -->
        <div class="flex-1 px-10 mb-10">
            <?php getNavBar("Thống kê > Tổng quan"); ?>
            <main>
                <div class="flex justify-between py-5 mb-3">
                    <h3 class="font-semibold text-2xl">Tổng quan</h3>
                    <div class="flex space-x-3">
                        <button id="excel" class="px-3 py-2 bg-gray-700 text-gray-50 hover:bg-gray-600 transition-all">Xuất Excel</button>
                    </div>
                </div>
                <div>
                    <div class="table-responsive">
                        <table id="report_table" class="table table-borderless table-hover" width="100%" cellspacing="0">
                            <thead class="bg-gray-50 py-2">
                                <tr class="grid grid-cols-6">
                                    <th class="text-center text-sm font-medium">Ngày</th>
                                    <th class="text-center text-sm font-medium">Tổng hoá đơn</th>
                                    <th class="text-center text-sm font-medium col-span-2">Tổng tiền</th>
                                    <th class="text-center text-sm font-medium col-span-2">Tổng thu</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <?php foreach ($profits as $key => $data) : ?>
                                    <?php if (intval($data['TongHoaDon'])) : ?>
                                        <tr class="grid grid-cols-6 py-1">
                                            <td class="text-center text-sm"><?= $key ?></td>
                                            <td class="text-center text-sm"><?= $data['TongHoaDon'] ?></td>
                                            <td class="text-center text-sm col-span-2">
                                                <?= number_format($data['TongTien'], 0, ",", ".") . "đ" ?? 0 ?>
                                            </td>
                                            <td class="text-center text-sm col-span-2">
                                                <?= number_format($data['TongThu'], 0, ",", ".") . "đ" ?? 0 ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#report_table').DataTable({
                "searching": false,
                "info": false,
                "bLengthChange": false,
                "ordering": false,
                "paging": false,
            });

            $('#excel').click(() => {
                exportTableToExcel("report_table","baocao");
            })
        });
    </script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>