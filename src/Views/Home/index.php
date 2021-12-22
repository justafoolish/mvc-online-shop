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

        <div class="flex-1 px-1">
            <!-- slide banner -->
            <div class="relative">
                <ul>
                    <li class="mt-1">
                        <img src="<?= BASE_URL ?>/public/images/banner/slideshow_3.webp" alt="" class="w-full" />
                    </li>
                </ul>
                <div class="absolute bottom-0 right-0">
                    <button class="p-6 bg-gray-100 opacity-90 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button class="p-6 bg-gray-100 opacity-90 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
            <!-- main content  -->
            <header class="text-center py-7">
                <h2 class="font-medium text-3xl text-gray-800 mb-2">New Arrivals</h2>
                <a href="<?= BASE_URL ?>/Collection/" class="text-sm text-gray-600 hover:text-gray-900">Xem Thêm</a>
            </header>
            <main class="mb-10 grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-2 px-4" id="indexProduct">
                <?php
                foreach($data['latestProduct'] as $product) {
                ?>
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden">
                            <a href="<?= BASE_URL ?>/Product/Index/<?= $product['MaSP'] ?>">
                                <img src="<?= BASE_URL ?>/public/images/products/<?= $product['Hinh1'] ?>" class="max-w-full h-auto" />
                            </a>
                            
                            <?php if($product['ChietKhau']) { ?>
                            <div class="absolute top-3 left-1 bg-black rounded-full w-10 h-10 grid place-items-center">
                                <span class="text-white text-xs font-semibold">-<?= $product['ChietKhau'] ?>%</span>
                            </div>
                            <?php }?>

                            <div class="grid grid-cols-2 gap-2 absolute w-full bottom-0 left-0 group-hover:translate-y-0 transform translate-y-full transition-all">
                                <button class="uppercase bg-black text-white text-xs py-3">Mua Ngay</button>
                                <button class="uppercase bg-black text-white text-xs py-3" value="<?= $product['MaSP'] ?>" id="addtocart">Thêm vào giỏ</button>
                            </div>
                        </div>
                        <div class="text-center pb-3 pt-2 cursor-default">
                            <a href="<?= BASE_URL ?>/Product/Index/<?= 4 ?>">
                                <h3 class="font-medium text-md mb-1 text-gray-800 uppercase"><?= $product['TenSP'] ?></h3>
                            </a>
                            <div class="flex justify-center items-center">
                            <?php if($product['ChietKhau']) { ?>
                                <h4 class="font-medium text-sm text-red-500 mr-2"><?= number_format(intval($product['DonGia'])*(100 - intval($product['ChietKhau']))/100,0,",",".") ?> <sup>vnđ</sup></h4>
                            <?php }?>
                                <h4 class="font-light text-sm text-gray-700  <?= $product['ChietKhau'] ? "line-through" : "" ?>"><?= number_format($product['DonGia'],0,",",".") ?> <sup>vnđ</sup></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </main>
        </div>
    </div>
    <?php require_once "./src/Views/Templates/sidebar.php" ?>
</body>

</html>