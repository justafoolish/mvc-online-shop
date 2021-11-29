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
                <a class="flex text-gray-600 hover:text-gray-800 cursor-pointer items-center group relative" href="../Collection">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 opacity-0 group-hover:opacity-100 absolute top-0 -left-1 transition-all transform translate translate-x-1 group-hover:translate-x-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform translate-x-0 group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="uppercase text-sm ml-1">back to collections</span>
                </a>
            </header>
            <main class="grid grid-cols-3">
                <div class="col-span-2">
                    <div class="flex justify-around">
                        <img src="<?= BASE_URL ?>/public/images/2310_8_8f886f646f4f4cefa6c46af0d0e22cc2_large.jpeg" alt="" class="max-w-full" />
                        <img src="<?= BASE_URL ?>/public/images/2310_8_8f886f646f4f4cefa6c46af0d0e22cc2_large.jpeg" alt="" class="max-w-full" />
                    </div>
                </div>
                <div class="px-3">
                    <h3 class="font-medium text-2xl mb-2 text-gray-900">Hades basic Tee</h3>
                    <h4 class="text-sm text-gray-500 font-light mb-4">
                        <span>ID: </span>
                        <span>SP001</span>
                    </h4>
                    <h4 class="font-semibold text-lg text-gray-700 mb-4">350.000 <sup>vnđ</sup></h4>
                    <form action="" class="mb-3">
                        <div class="mb-4">
                            <h4 class="font-medium mb-3">Size</h4>
                            <ul class="flex space-x-3">
                                <li>
                                    <label class="h-full w-full cursor-pointer group">
                                        <input type="radio" name="size" value="s" checked />
                                        <span class="h-10 w-10 grid place-items-center inline-block border border-gray-300 group-hover:bg-black group-hover:text-white transition-all radio-label">S</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="h-full w-full cursor-pointer group">
                                        <input type="radio" name="size" value="m" />
                                        <span class="h-10 w-10 grid place-items-center inline-block border border-gray-300 group-hover:bg-black group-hover:text-white transition-all radio-label">M</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="h-full w-full cursor-pointer group">
                                        <input type="radio" name="size" value="l" />
                                        <span class="h-10 w-10 grid place-items-center inline-block border border-gray-300 group-hover:bg-black group-hover:text-white transition-all radio-label">L</span>
                                    </label>
                                </li>
                            </ul>
                            <div class="flex my-5 w-32 justify-between inline-block">
                                <button class="px-3 py-2 bg-gray-100 text-gray-500 hover:text-gray-800" id="qty-detail-dec">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                    </svg>
                                </button>
                                <input type="text" class="w-16 text-center border-t-2 border-b-2 border-gray-100 bg-white" min="1" value="1" id="quantity" name="quantity" disabled />
                                <button class="px-3 py-2 bg-gray-100 text-gray-500 hover:text-gray-800" id="qty-detail-inc">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button class="w-full border border-black py-4 mb-2 font-semibold text-xs uppercase hover:bg-black hover:text-white transition-all">Thêm vào giỏ</button>
                        <button class="w-full border border-black py-4 mb-2 font-semibold text-xs uppercase bg-black text-white">Mua ngay</button>
                    </form>
                    <button class="underline mb-2 text-gray-600">Hướng dẫn chọn size</button>
                    <div class="text-gray-800">
                        <p>Chất liệu</p>
                        <p>Design by Hades</p>
                    </div>
                </div>
            </main>

            <div class="mt-10 mb-6">
                <h4 class="uppercase mb-4 font-semibold text-gray-900">sản phẩm liên quan</h4>
                <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-2 px-4">
                    <?php $i = 4;
                    while ($i-- > 0) { ?>
                        <div class="group cursor-pointer">
                            <div class="relative overflow-hidden">
                                <a href="../Detail">
                                    <img src="<?= BASE_URL ?>/public/images/2310_8_8f886f646f4f4cefa6c46af0d0e22cc2_large.jpeg" class="max-w-full h-auto" />
                                </a>
                                <div class="absolute top-3 left-1 bg-black rounded-full w-10 h-10 grid place-items-center">
                                    <span class="text-white text-xs font-semibold">-34%</span>
                                </div>
                                <div class="flex justify-between absolute w-full bottom-0 left-0 group-hover:translate-y-0 transform translate-y-full transition-all">
                                    <button class="uppercase bg-black text-white text-xs px-8 py-3">Mua Ngay</button>
                                    <button class="uppercase bg-black text-white text-xs px-8 py-3">Thêm vào giỏ</button>
                                </div>
                            </div>
                            <div class="text-center pb-3 pt-2 cursor-default">
                                <a href="../Detail">
                                    <h3 class="font-medium text-md mb-1 text-gray-800 uppercase">Hades/New balance Basic Tee</h3>
                                </a>
                                <div class="flex justify-center items-center">
                                    <h4 class="font-medium text-sm text-red-500 mr-2">250.000 <sup>vnđ</sup></h4>
                                    <h4 class="font-light text-sm text-gray-700 line-through">380.000 <sup>vnđ</sup></h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "./src/Views/Templates/sidebar.php" ?>
    <script src="<?= BASE_URL ?>/public/scripts/detailpage.js"></script>
</body>

</html>