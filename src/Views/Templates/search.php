
<?php
foreach ($data['products'] as $product) { ?>
    <div class="flex justify-between border-b pb-3 mb-2">
        <div class="flex-auto">
            <h3 class="mt-2 text-gray-800 uppercase">
                <a href="<?= BASE_URL ?>/Product/ID/<?= $product['MaSP'] ?>"><?= $product['TenSP'] ?></a>
            </h3>
            <div class="flex items-center">
                <?php if($product['ChietKhau']) { ?>
                    <h4 class="font-medium text-sm text-red-500 mr-2"><?= number_format(intval($product['DonGia'])*(100 - intval($product['ChietKhau']))/100,0,",",".") ?> <sup>vnđ</sup></h4>
                <?php }?>
                <h4 class="font-light text-sm text-gray-700  <?= $product['ChietKhau'] ? "line-through" : "" ?>"><?= number_format($product['DonGia'],0,",",".") ?> <sup>vnđ</sup></h4>
            </div>
        </div>
        <div class="w-12 ml-5">
            <img src="<?= BASE_URL ?>/public/images/products/<?= $product['Hinh1'] ?>" class="max-w-full h-auto" />
        </div>
    </div>
<?php } ?>