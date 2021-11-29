<!DOCTYPE html>
<html lang="en">

<?php require_once "./src/Views/Templates/head.php"; ?>

<body>
    <?php require_once "./src/Views/Templates/header.php" ?>
    <div class="flex">
        <?php
        require_once "./src/Views/Templates/navbar.php";
        getNavBar($data['collections']);
        ?>
        <div class="flex-1 px-3">
            <header class="my-5">
                <a class="flex text-gray-600 hover:text-gray-800 cursor-pointer items-center group relative" href="<?= BASE_URL ?>/Cart/">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 opacity-0 group-hover:opacity-100 absolute top-0 -left-1 transition-all transform translate translate-x-1 group-hover:translate-x-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform translate-x-0 group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="uppercase text-sm ml-1">back to cart</span>
                </a>
            </header>
            <main class="grid grid-cols-11 pt-4">
                <div class="col-span-6 px-5">
                    <h2>Thông tin giao hàng</h2>
                    <div class="grid grid-cols-3 gap-x-3 gap-y-4 mt-3">
                        <div class="border py-2 px-3 rounded border-gray-400 text-gray-800 focus-within:ring-2 focus-within:ring-gray-600 transition-all col-span-3">
                            <input type="text" class="placeholder-gray-600 outline-none w-full" placeholder="Họ và tên">
                        </div>
                        <div class="border py-2 px-3 rounded border-gray-400 text-gray-800 focus-within:ring-2 focus-within:ring-gray-600 transition-all col-span-2">
                            <input type="email" class="placeholder-gray-600 outline-none" placeholder="Email">
                        </div>
                        <div class="border py-2 px-3 rounded border-gray-400 text-gray-800 focus-within:ring-2 focus-within:ring-gray-600 transition-all ">
                            <input type="text" class="placeholder-gray-600 outline-none max-w-full" placeholder="Số điện thoại">
                        </div>
                        <div class="border py-2 px-3 rounded border-gray-400 text-gray-800 focus-within:ring-2 focus-within:ring-gray-600 transition-all col-span-3">
                            <input type="text" class="placeholder-gray-600 outline-none w-full" placeholder="Địa chỉ">
                        </div>
                        <div class="border rounded border-gray-400 text-gray-800 focus-within:ring-2 focus-within:ring-gray-600 transition-all ">
                            <select name="" id="" class="py-2 px-3 bg-white outline-none">
                                <option disabled selected>Chọn tỉnh / thành</option>
                            </select>
                        </div>
                        <div class="border rounded border-gray-400 text-gray-800 focus-within:ring-2 focus-within:ring-gray-600 transition-all ">
                            <select name="" id="" class="py-2 px-3 bg-white outline-none">
                                <option disabled selected>Chọn quận / huyện</option>
                            </select>
                        </div>
                        <div class="border rounded border-gray-400 text-gray-800 focus-within:ring-2 focus-within:ring-gray-600 transition-all ">
                            <select name="" id="" class="py-2 px-3 bg-white outline-none">
                                <option disabled selected>Chọn phường / xã</option>
                            </select>
                        </div>
                    </div>
                    <div class="my-6">
                        <h3>Phương thức vận chuyển</h3>
                        <div class="flex justify-between border py-4 px-3 mt-6 rounded border-gray-400 text-gray-800 focus-within:ring-2 focus-within:ring-gray-600 transition-all">
                            <label class="flex items-center mr-4 cursor-pointer group">
                                <input type="radio" name="shipping" checked disabled />
                                <span class="checkbox relative w-5 h-5 rounded-full inline-block bg-gray-100 mr-2 group-hover:bg-gray-300 border border-gray-200">
                                    <span class="absolute w-full h-full bg-black rounded-full transform scale-50 hidden"></span>
                                </span>
                                <span>Giao hàng tận nơi</span>
                            </label>
                            <span>40,000<sup>đ</sup></span>
                        </div>
                    </div>
                    <div class="my-6">
                        <h3>Phương thức thanh toán</h3>
                        <div class="mt-6 border rounded border-gray-400 text-gray-800 focus-within:ring-2 focus-within:ring-gray-600 transition-all divide-y-2">
                            <div class="px-3 py-4">
                                <label class="flex items-center mr-4 cursor-pointer group">
                                    <input type="radio" name="paymethod" checked />
                                    <span class="checkbox relative w-5 h-5 rounded-full inline-block bg-gray-100 mr-2 group-hover:bg-gray-300 border border-gray-200">
                                        <span class="absolute w-full h-full bg-black rounded-full transform scale-50 hidden"></span>
                                    </span>
                                    <span>Thanh toán khi giao hàng(COD)</span>
                                </label>
                            </div>
                            <div class="px-3 py-4">
                                <label class="flex items-center mr-4 cursor-pointer group">
                                    <input type="radio" name="paymethod" />
                                    <span class="checkbox relative w-5 h-5 rounded-full inline-block bg-gray-100 mr-2 group-hover:bg-gray-300 border border-gray-200">
                                        <span class="absolute w-full h-full bg-black rounded-full transform scale-50 hidden"></span>
                                    </span>
                                    <span>Thanh toán qua ví điện tử</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="bg-black text-gray-200 px-4 py-3 rounded hover:bg-gray-800">Hoàn tất đơn hàng</button>
                    </div>
                </div>
                <div class="col-span-4 pl-5 space-y-5 divide-y-2 divide-gray-100 ">
                    <div>
                        <div class="flex justify-between">
                            <div class="flex-auto flex">
                                <div class="border-2 border-gray-200 rounded relative">
                                    <div class="overflow-hidden w-16 h-16">
                                        <img src="<?= BASE_URL ?>/public/images/2310_8_8f886f646f4f4cefa6c46af0d0e22cc2_large.jpeg" class="w-full object-cover object-center" alt="">
                                    </div>
                                    <span class="absolute -top-3 -right-3 bg-gray-500 h-6 w-6 rounded-full text-white grid place-items-center">1</span>
                                </div>
                                <div class="pl-5 grid place-items-center">
                                    <h3 class="mr-auto text-gray-900 text-sm font-medium">HADES SIGNATURE OVERSHIRT</h3>
                                    <h3 class="mr-auto text-gray-700 text-sm">ĐEN / S</h3>
                                </div>
                            </div>
                            <div class="grid place-items-center">
                                <span>300,000<sup>đ</sup></span>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-x-2 pt-6 pb-1">
                        <div class="col-span-2 border py-2 px-3 rounded border-gray-400 text-gray-800 focus-within:ring-2 focus-within:ring-gray-600 transition-all">
                            <input type="text" class="placeholder-gray-600 outline-none w-full" placeholder="Mã giảm giá">
                        </div>
                        <button class="text-white bg-gray-400 hover:bg-gray-500 rounded transition-all">Sử dụng</button>
                    </div>
                    <div class="pt-7 pb-2 space-y-2">
                        <div class="flex justify-between items-center">
                            <h3>Tạm tính</h3>
                            <p class="font-medium text-lg">300,000<sup>đ</sup></p>
                        </div>
                        <div class="flex justify-between items-center">
                            <h3>Phí vận chuyển</h3>
                            <p class="font-medium text-lg">40,000<sup>đ</sup></p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center pt-7 pb-2">
                        <h3>Tổng tiền</h3>
                        <span class="font-semibold text-2xl">340,000<sup>đ</sup></span>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php require_once "./src/Views/Templates/sidebar.php" ?>
    <script src="<?= BASE_URL ?>/public/scripts/cartPage.js"></script>
</body>

</html>