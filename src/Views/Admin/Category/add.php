<?php require_once "./src/Views/Admin/Templates/navbar.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php
    $category = $data['previousData'];
?>
<head>
    <?php require_once "./src/Views/Admin/Templates/header.php" ?>
</head>

<body>
    <div class="relative min-h-screen flex">
        <!-- side bar -->
        <?php require_once "./src/Views/Admin/Templates/sidebar.php" ?>
        <!-- main content -->
        <div class="flex-1 mb-10">
            <form action="<?= BASE_URL ?>/CategoryManage/SubmitNewCategory" method="post">
                <header class='flex justify-end items-center py-4 sticky top-0 inset-x-0 bg-white z-10 shadow-lg px-10 space-x-3'>
                    <a class="text-xs py-2 px-5 bg-gray-500 hover:bg-gray-600 transition-all text-gray-50" href="../Category">Huỷ</a>
                    <button class="text-xs py-2 px-5 bg-blue-500 hover:bg-blue-600 transition-all text-gray-50" type="submit" name="submit">Lưu</button>
                </header>
                <main class="px-10 mt-5">
                    <h3 class="font-semibold text-2xl border-b pb-2">Tạo danh mục</h3>
                    <div class="grid grid-cols-6 mt-2 gap-4">
                        <div class="col-start-2 col-span-4 space-y-3">
                            <div>
                                <label>Tên danh mục</label>
                                <input type="text" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" placeholder="Nhập tên danh mục" name="name" value="<?= $category['TenDanhMuc'] ?>">
                            </div>
                            <div>
                                <label>Miêu tả</label>
                                <textarea rows="5" class="border w-full px-3 py-2 mt-1 focus:ring-gray-700 focus:ring-2 transition-all outline-none" name="describe"><?= $category['MoTa'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </main>
            </form>
        </div>
    </div>
</body>

</html>