<main id="cartProduct" class="space-y-4">
    <?php
    $total = 0;
    foreach ($data['carts'] as $product) { 
        $total += intval($product['DonGia'])*intval($product['SoLuong']);    
    ?>
        <div class="flex justify-between items-center pb-2 border-b" id="cart-item-sidebar">
            <div class="w-14 mr-3">
                <img src="<?= BASE_URL ?>/public/images/products/<?= $product['Hinh1'] ?>" class="max-w-full" />
            </div>
            <div class="flex-auto pl-3">
                <h3 class="text-gray-800 text-sm"><?= $product['TenSP'] ?></h3>
                <p class="text-sm text-gray-500 my-2 uppercase"><?= $product['MaSize'] ?></p>
                <div class="flex justify-between items-center">
                    <div class="flex justify-between items-center">
                        <span class="py-1 px-3 bg-gray-200 text-gray-600 mr-2"><?= $product['SoLuong'] ?></span>
                        <span><?= number_format($product['DonGia'],0,",",".") ?> <sup>vnđ</sup></span>
                    </div>
                    <button class="hover:text-red-400" id="delete-cart-item-sidebar" value="<?= $product['MaSP'].$product['MaSize'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    <?php } ?>
</main>
<div class="mb-2 border-t-2 border-black">
    <div class="flex justify-between items-center my-4">
        <p>Tổng Tiền:</p>
        <p class="font-medium" id="total"><?= number_format($total,0,",",".") ?> <sup>vnđ</sup></p>
    </div>
    <div class="flex justify-between mb-2">
        <a class="uppercase bg-black text-white text-xs px-6 py-3" href="<?= BASE_URL ?>/Cart/">Xem Giỏ Hàng</a>
        <a class="uppercase bg-black text-white text-xs px-6 py-3" href="<?= BASE_URL ?>/Checkout/">Thanh Toán</a>
    </div>
</div>