<?php require_once "./src/Views/Admin/Templates/navbar.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php 
    $profits = $data['profits'];
?>
<head>
    <?php require_once "./src/Views/Admin/Templates/header.php" ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->
    <!-- <script src="https://www.gstatic.com/charts/loader.js"> -->
    </script>
</head>

<body>
    <div class="relative min-h-screen flex">
        <!-- side bar -->
        <?php require_once "./src/Views/Admin/Templates/sidebar.php" ?>
        <!-- main content -->
        <div class="flex-1 px-10 mb-10">
            <?php getNavBar("Báo cáo > Tổng quan"); ?>
            <main>
                <div class="flex justify-between py-5 mb-3">
                    <h3 class="font-semibold text-2xl">Tổng quan</h3>
                    <div class="flex space-x-3">
                        <!-- <button class="flex items-center bg-gray-700 text-gray-200 text-xs px-3 py-2 hover:text-gray-100 hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>Tạo danh mục
                        </button> -->
                    </div>
                </div>
                <!-- <div>
                    <div id="myChart" style="height: 400px" class="max-w-full"></div>

                    <script>
                        google.charts.load('current', {
                            packages: ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);
                        var responseData = []
                        function drawChart() {
                            const today = parseInt(new Date().getDate());
                            let valueChart = [['Ngày', 'Doanh thu']]
                            var i = 0;
                            let responseData = []
                            var value
                            function update(val) {
                                responseData.push([val]);
                            }
                            while (i++ <= today) {
                                console.log(i)
                                
                                $.post(`${BASE_UR}/OrderManage/GetProfit/${i}`, {ajax: true} , function(data) {
                                    update(data)
                                });
                                // responseData.push([i, value])
                            }
                            // Set Data
                            var data = google.visualization.arrayToDataTable(valueChart);
                            // Set Options
                            var options = {
                                title: 'Thống kê doanh thu',
                                hAxis: {
                                    title: 'Ngày'
                                },
                                vAxis: {
                                    title: 'Doanh thu'
                                },
                                legend: 'none'
                            };
                            // Draw
                            var chart = new google.visualization.LineChart(document.getElementById('myChart'));
                            chart.draw(data, options);
                        }
                    </script>
                </div> -->
                <div>
                    <div>
                        <div class="grid grid-cols-6 bg-gray-50 py-2">
                            <div class="text-center text-sm font-medium">Ngày</div>
                            <div class="text-center text-sm font-medium">Tổng hoá đơn</div>
                            <div class="text-center text-sm font-medium col-span-2">Tổng tiền</div>
                            <div class="text-center text-sm font-medium col-span-2">Tổng thu</div>
                        </div>
                    </div>
                    <div class="divide-y">
                        <?php foreach ($profits as $key => $data):?>
                        <div class="grid grid-cols-6 py-4">
                            <div class="text-center text-sm"><?= $key ?></div>
                            <div class="text-center text-sm"><?= $data['TongHoaDon'] ?></div>
                            <div class="text-center text-sm col-span-2"><?= $data['TongTien'] ?? 0 ?></div>
                            <div class="text-center text-sm col-span-2"><?= $data['TongThu'] ?? 0 ?></div>
                        </div>
                        <?php endforeach; ?>
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