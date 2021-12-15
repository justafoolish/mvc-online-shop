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
            <?php getNavBar("Dashboard"); ?>
            <main>
                <div class="flex justify-between py-5 mb-3">
                    <h3 class="font-semibold text-2xl">Dashboard</h3>
                    <div class="flex space-x-3">
                    </div>
                </div>
                <div>
                    <div class="grid grid-cols-4 gap-5">
                        <div class="border rounded-lg overflow-hidden shadow-xl">
                            <div class="flex justify-between bg-blue-500 px-6 py-4 text-white">
                                <div>
                                    <h3 class="text-2xl">Sản phẩm</h3>
                                    <h3 class="font-medium text-2xl"><?= $data['totalProduct'] ?></h3>
                                </div>
                                <div class="flex-1 grid place-items-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shirt" width="45" height="45" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="px-6 py-2 text-blue-500 hover:text-blue-600">
                                <a href="<?= BASE_URL ?>/ProductManage/" class="flex justify-between">
                                    <span>Xem chi tiết</span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="border rounded-lg overflow-hidden shadow-xl">
                            <div class="flex justify-between bg-green-500 px-6 py-4 text-white">
                                <div>
                                    <h3 class="text-2xl">Đơn hàng</h3>
                                    <h3 class="font-medium text-2xl"><?= $data['totalOrder'] ?></h3>
                                </div>
                                <div class="flex-1 grid place-items-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-invoice" width="45" height="45" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <line x1="9" y1="7" x2="10" y2="7"></line>
                                        <line x1="9" y1="13" x2="15" y2="13"></line>
                                        <line x1="13" y1="17" x2="15" y2="17"></line>
                                    </svg>
                                </div>
                            </div>
                            <div class="px-6 py-2 text-green-500 hover:text-green-600">
                                <a href="<?= BASE_URL ?>/OrderManage/" class="flex justify-between">
                                    <span>Xem chi tiết</span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="border rounded-lg overflow-hidden shadow-xl">
                            <div class="flex justify-between bg-pink-500 px-6 py-4 text-white">
                                <div>
                                    <h3 class="text-2xl">Khách hàng</h3>
                                    <h3 class="font-medium text-2xl"><?= $data['totalCustomer'] ?></h3>
                                </div>
                                <div class="flex-1 grid place-items-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="45" height="45" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="px-6 py-2 text-pink-500 hover:text-pink-600">
                                <a href="<?= BASE_URL ?>/CustomerManage/" class="flex justify-between">
                                    <span>Xem chi tiết</span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="border rounded-lg overflow-hidden shadow-xl">
                            <div class="flex justify-between bg-purple-500 px-6 py-4 text-white">
                                <div>
                                    <h3 class="text-2xl">Doanh thu</h3>
                                    <h3 class="font-medium text-2xl"><?= number_format($data['profit'],0,",",".") ?><sup>đ</sup></h3>
                                </div>
                                <div class="flex-1 grid place-items-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="45" height="45" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="7" y="9" width="14" height="10" rx="2"></rect>
                                        <circle cx="14" cy="14" r="2"></circle>
                                        <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="px-6 py-2 text-purple-500 hover:text-purple-600">
                                <a href="<?= BASE_URL ?>/OrderManage/" class="flex justify-between">
                                    <span>Xem chi tiết</span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
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