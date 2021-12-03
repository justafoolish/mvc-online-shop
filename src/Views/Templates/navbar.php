<?php 

function getNavBar($collection)
{ ?>
    <div class="min-h-screen w-56 relative bg-gray-50">
        <div class="sticky top-7 px-8 pt-7">
            <a href="<?= BASE_URL ?>/Home/"> <img src="<?= BASE_URL ?>/public/images/logo.webp" alt=""> </a>
            <ul class=" mt-5 space-y-2">
                <li><a href="<?= BASE_URL ?>/Collection/" class="uppercase font-semibold text-sm hover:text-gray-600">Shop All</a></li>
                <?php foreach ($collection as $value) { ?>
                    <li><a href="<?= BASE_URL ?>/Collection/Show/<?= $value['id']; ?>" class="uppercase font-semibold text-sm hover:text-gray-600"><?= $value['name']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>