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
        <div class="flex-1 px-5">
        <!-- action="<?= BASE_URL ?>/Account/checklogin" method="post" -->
            <form  autocomplete="off">
                <div class="md:w-2/5 lg:w-1/3 w-2/3">
                    <!-- <div class="lg:w-1/4 md:w-1/3 w-2/3"> -->
                    <h3 class="my-5 font-medium text-lg">Đăng nhập</h3>
                    <div class="relative mb-4 form-group">
                        <label class="top-1/6 mt-3 left-4 absolute text-gray-500 font-medium pointer-events-none transition-all" fType="lbl">Email</label>
                        <input id="logmail" name="email" autocomplete="off" type="email" class="form-input px-4 py-3 bg-gray-100 outline-none text-gray-800 w-full transition-all border-b-2 border-gray-300 focus:border-black" fType="inp" required readonly 
onfocus="this.removeAttribute('readonly');"/>
                    <span class="text-red-500 mt-5 hidden" id="message"></span>
                    </div>
                    
                    <div class="relative mb-4 form-group">
                        <label class="top-1/6 mt-3 left-4 absolute text-gray-500 font-medium pointer-events-none transition-all" fType="lbl">Password</label>
                        <input id="logpasswd" name="password" autocomplete="off" type="password" class="px-4 py-3 bg-gray-100 outline-none text-gray-800 w-full transition-all border-b-2 border-gray-300 focus:border-black" fType="inp" required readonly 
onfocus="this.removeAttribute('readonly');"/>
                    <span class="text-red-500 mt-5 hidden" id="message"></span>
                    </div>
                    <div class="flex justify-between">
                        <button class="bg-black py-3 px-8 text-white border border-black hover:bg-white hover:text-gray-700 transition-all" name="submit" id="login">Đăng nhập</button>
                        <div class="px-3 mr-auto ml-3">
                            <a href="" class="text-gray-800 hover:text-black">Quên mật khẩu?</a>
                            <br />
                            <span class="text-gray-600">hoặc</span>
                            <a href="<?= BASE_URL ?>/Account/Register" class="text-gray-800 hover:text-black">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require_once "./src/Views/Templates/sidebar.php" ?>
    <script src="<?= BASE_URL ?>/public/scripts/form.js?v=4"></script>
</body>

</html>