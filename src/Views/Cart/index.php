<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./src/Views/Templates/head.php"; ?>
</head>

<body>
    <?php require_once "./src/Views/Templates/header.php" ?>
    <div class="flex">
        <?php
        require_once "./src/Views/Templates/navbar.php";
        getNavBar($data['collections']);
        ?>
        <div class="flex-1 px-3">
            <header class="my-5">
                <a class="flex text-gray-600 hover:text-gray-800 cursor-pointer items-center group relative" href="<?= BASE_URL ?>/Home/">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 opacity-0 group-hover:opacity-100 absolute top-0 -left-1 transition-all transform translate translate-x-1 group-hover:translate-x-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform translate-x-0 group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="uppercase text-sm ml-1">back to homepage</span>
                </a>
            </header>
            <main class="grid grid-cols-4">
                <div class="col-span-3 px-5">
                    <h3 class="font-semibold text-gray-800">Đang có <?= count($data['cart']) ?> sản phẩm trong giỏ hàng</h3>
                    <?php if(!count($data['cart'])) { ?>
                    <div class="w-full my-5 pb-5 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40 text-gray-800 mx-auto mb-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <h3 class="text-center mb-5">Giỏ hàng đang trống</h3>
                        <a href="../Collection" class="my-5 bg-gray-800 text-gray-50 px-6 py-3 hover:bg-gray-600 transition-all">Tiếp tục mua hàng</a>
                    </div>
                    <?php } ?>
                    <!-- cart item  -->
                    <?php
                    $total = 0;
                    foreach ($data['cart'] as $product) { 
                        $subTotal = intval($product['DonGia'])*intval($product['SoLuong']);
                        $total += $subTotal;
                    ?>
                        <div class="grid grid-cols-12 pr-6 mt-1 py-6 border-b border-gray-300" id="cartItem">
                            <div class="w-16">
                                <img src="<?= BASE_URL ?>/public/images/products/<?= $product['Hinh1'] ?>" class="max-w-full mx-auto" />
                            </div>
                            <div class="col-span-5 flex flex-col justify-center pl-3">
                                <h3 class="font-bold text-gray-800"><?= $product['TenSP'] ?></h3>
                                <p class="font-light text-gray-500">Size: <span class="uppercase"><?= $product['MaSize'] ?></span></p>
                            </div>
                            <div class="flex justify-between items-center w-20 col-span-2">
                                <button class="px-1 py-1 bg-gray-100 text-gray-500 hover:text-gray-800 border-2 border-gray-100" id="qty-detail-dec" pid="<?= $product['MaSP'] ?>" size="<?= $product['MaSize'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                    </svg>
                                </button>
                                <input type="text" class="w-10 text-center border-t-2 border-b-2 border-gray-100 bg-white" min="1" value="<?= $product['SoLuong'] ?>" id="quantity" name="quantity" disabled />
                                <button class="px-1 py-1 bg-gray-100 text-gray-500 hover:text-gray-800 border-2 border-gray-100" id="qty-detail-inc" pid="<?= $product['MaSP'] ?>" size="<?= $product['MaSize'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </button>
                            </div>
                            <div class="grid place-items-center col-span-2">
                                <p class="text-gray-700 text-sm"><?= number_format($product['DonGia'],0,",",".") ?><u>đ</u></p>
                            </div>
                            <div class="grid place-items-center col-span-2">
                                <h3>Thành tiền</h3>
                                <h3 class="text-sm text-red-600 font-medium" id="product-total"><?= number_format($subTotal,0,",",".") ?> <u>đ</u></h3>
                                <button class="hover:text-red-400" id="deleteItem" value="<?= $product['MaSP'].$product['MaSize'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="px-2">
                    <div class="border border-gray-300 px-3 bg-gray-50">
                        <h3 class="py-4 border-b border-gray-200 font-semibold text-gray-900 text-lg">Thông tin đơn hàng</h3>
                        <div class="flex py-4 border-b border-gray-200 justify-between text-gray-800 font-medium">
                            <h3>Tổng tiền</h3>
                            <span id="cartTotal"><?= number_format($total,0,",",".") ?> <sup>vnđ</sup></span>
                        </div>
                        <a class="block text-center w-full px-2 py-3 bg-gray-900 text-white my-3 hover:bg-gray-800 uppercase" href="<?= BASE_URL ?>/Checkout/" id="checkout">Thanh Toán</a>
                    </div>
                </div>
            </main>

            <!-- Gợi ý sản phẩm -->
            <div class="mt-10 mb-6">
                <h4 class="uppercase mb-4 font-semibold text-gray-900">sản phẩm liên quan</h4>
                <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-2 px-4">


                    <?php $i = 4;
                    while ($i--) { ?>
                        <!-- <div class="group cursor-pointer">
                            <div class="relative overflow-hidden">
                                <a href="<?= BASE_URL ?>/Product/ID/<?= 5 ?>">
                                    <img src="<?= BASE_URL ?>/public/images/products/ao1.jpeg" class="max-w-full h-auto" />
                                </a>
                                <div class="absolute top-3 left-1 bg-black rounded-full w-10 h-10 grid place-items-center">
                                    <span class="text-white text-xs font-semibold">-34%</span>
                                </div>
                            </div>
                            <div class="text-center pb-3 pt-2 cursor-default">
                                <a href="<?= BASE_URL ?>/Product/ID/<?= 5 ?>">
                                    <h3 class="font-medium text-md mb-1 text-gray-800 uppercase">Hades/New balance Basic Tee</h3>
                                </a>
                                <div class="flex justify-center items-center">
                                    <h4 class="font-medium text-sm text-red-500 mr-2">250.000 <sup>vnđ</sup></h4>
                                    <h4 class="font-light text-sm text-gray-700 line-through">380.000 <sup>vnđ</sup></h4>
                                </div>
                            </div>
                        </div> -->
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "./src/Views/Templates/sidebar.php" ?>
    <script src="<?= BASE_URL ?>/public/scripts/cartPage.js?v=2"></script>
</body>

</html>