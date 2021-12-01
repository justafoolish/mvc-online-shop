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

            <header class="text-center py-7">
                <h2 class="font-medium text-3xl text-gray-800 mb-2">Tất cả sản phẩm</h2>
            </header>
            <div class="flex items-center">
                <label class="mr-2">Sắp xếp theo:</label>
                <div class="border border-gray-300 px-3 py-1 rounded-md">
                    <select name="" class="outline-none">
                        <option value="" select>Tên: A-Z</option>
                        <option value="">Tên: Z-A</option>
                        <option value="">Giá: Tăng dần</option>
                        <option value="">Giá: Giảm dần</option>
                    </select>
                </div>
            </div>
            <main class="mb-10 grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-4">
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden">
                        <a href="<?= BASE_URL ?>/Product/ID/<?= 4 ?>">
                            <img src="<?= BASE_URL ?>/public/images/products/ao1.jpeg" class="max-w-full h-auto" />
                        </a>
                        <div class="grid grid-cols-2 gap-3 absolute w-full bottom-0 left-0 group-hover:translate-y-0 transform translate-y-full transition-all">
                            <button class="uppercase bg-black text-white text-xs py-3">Mua Ngay</button>
                            <button class="uppercase bg-black text-white text-xs py-3">Thêm vào giỏ</button>
                        </div>
                    </div>
                    <div class="text-center pb-3 pt-2 cursor-default">
                        <a href="<?= BASE_URL ?>/Product/ID/<?= 4 ?>">
                            <h3 class="font-medium text-md mb-1 text-gray-800 uppercase">Hades/New balance Basic Tee</h3>
                        </a>
                        <div class="flex justify-center">
                            <h4 class="font-light text-sm text-gray-700">300.000 <sup>vnđ</sup></h4>
                            <h4></h4>
                        </div>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden">
                        <a href="<?= BASE_URL ?>/Product/ID/<?= 4 ?>">
                            <img src="<?= BASE_URL ?>/public/images/products/ao1.jpeg" class="max-w-full h-auto" />
                        </a>
                        <div class="absolute top-3 left-1 bg-black rounded-full w-10 h-10 grid place-items-center">
                            <span class="text-white text-xs font-semibold">-34%</span>
                        </div>
                        <div class="grid grid-cols-2 gap-3 absolute w-full bottom-0 left-0 group-hover:translate-y-0 transform translate-y-full transition-all">
                            <button class="uppercase bg-black text-white text-xs py-3">Mua Ngay</button>
                            <button class="uppercase bg-black text-white text-xs py-3">Thêm vào giỏ</button>
                        </div>
                    </div>
                    <div class="text-center pb-3 pt-2 cursor-default">
                        <a href="<?= BASE_URL ?>/Product/ID/<?= 4 ?>">
                            <h3 class="font-medium text-md mb-1 text-gray-800 uppercase">Hades/New balance Basic Tee</h3>
                        </a>
                        <div class="flex justify-center items-center">
                            <h4 class="font-medium text-sm text-red-500 mr-2">250.000 <sup>vnđ</sup></h4>
                            <h4 class="font-light text-sm text-gray-700 line-through">380.000 <sup>vnđ</sup></h4>
                        </div>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden">
                        <a href="<?= BASE_URL ?>/Product/ID/<?= 4 ?>">
                            <img src="<?= BASE_URL ?>/public/images/products/ao1.jpeg" class="max-w-full h-auto" />
                        </a>
                        <div class="absolute top-3 right-1 bg-black rounded-full w-10 h-10 grid place-items-center">
                            <span class="text-white text-xs font-semibold text-gray-200">Hết</span>
                        </div>
                        <div class="grid grid-cols-2 gap-3 absolute w-full bottom-0 left-0 group-hover:translate-y-0 transform translate-y-full transition-all">
                            <button class="uppercase bg-black text-white text-xs py-3">Mua Ngay</button>
                            <button class="uppercase bg-black text-white text-xs py-3">Thêm vào giỏ</button>
                        </div>
                    </div>
                    <div class="text-center pb-3 pt-2 cursor-default">
                        <a href="<?= BASE_URL ?>/Product/ID/<?= 4 ?>">
                            <h3 class="font-medium text-md mb-1 text-gray-800 uppercase">Hades/New balance Basic Tee</h3>
                        </a>
                        <div class="flex justify-center items-center">
                            <h4 class="font-light text-sm text-gray-700 mr-1">250.000 <sup>vnđ</sup></h4>
                            <!-- <h4 class="font-light text-sm text-gray-700 line-through">380.000 <sup>vnđ</sup></h4> -->
                        </div>
                    </div>
                </div>
            </main>
            <ul class="flex space-x-3 items-center justify-center my-3">
                <li class="text-md font-semibold text-gray-500 hover:text-gray-700">
                    <a href="../Collection/?page=1" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                        </svg>
                    </a>
                </li>
                <li class="text-md font-semibold text-gray-500 hover:text-gray-700">
                    <a href="../Collection/?page=1">1</a>
                </li>
                <li class="text-md font-semibold text-gray-500 hover:text-gray-700">
                    <a href="../Collection/?page=2">2</a>
                </li>
                <li class="text-md font-semibold text-gray-500 hover:text-gray-700">
                    <a href="../Collection/?page=3">3</a>
                </li>
                <li class="text-md font-semibold text-gray-500 hover:text-gray-700">
                    <a href="../Collection/?page=1" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </li>
            </ul>

        </div>
    </div>
    <?php require_once "./src/Views/Templates/sidebar.php" ?>
</body>

</html>