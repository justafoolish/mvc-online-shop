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

        <div class="flex-1 px-5 relative">
            <div class="fixed bg-indigo-300 text-gray-50 font-medium top-14 right-4 px-4 py-3 hidden" id="pageMessage">
                Đăng ký thành công
            </div>
            <form method="post" autocomplete="off" id="registerForm">
                <div class="md:w-2/5 lg:w-1/3 w-2/3">
                    <h3 class="mb-5 mt-8 font-medium text-xl">Đăng ký</h3>
                    <div class="relative mb-7 form-group">
                        <label class="top-1/4 left-4 absolute text-gray-500 font-medium pointer-events-none transition-all" fType="lbl">Họ tên</label>
                        <input autocomplete="off" type="text" class="form-input px-4 py-3 bg-gray-100 outline-none text-gray-800 w-full transition-all border-b-2 border-gray-300 focus:border-black" fType="inp" name="name" required/>
                    </div>
                    <div class="relative mb-7 form-group flex items-center">
                        <label for="male" class="flex items-center mr-4 cursor-pointer group">
                            <input type="radio" name="gender" id="male" checked value="male" required/>
                            <span class="checkbox relative w-6 h-6 rounded-full inline-block bg-gray-100 mr-2 group-hover:bg-gray-300 border border-gray-200">
                                <span class="absolute w-full h-full bg-black rounded-full transform scale-50 hidden"></span>
                            </span>
                            <span>Nam</span>
                        </label>
                        <label for="female" class="flex items-center mr-4 cursor-pointer group">
                            <input type="radio" name="gender" id="female" value="female" required/>
                            <span class="checkbox relative w-6 h-6 rounded-full inline-block bg-gray-100 mr-2 group-hover:bg-gray-300 border border-gray-200">
                                <span class="absolute w-full h-full bg-black rounded-full transform scale-50 hidden"></span>
                            </span>
                            <span>Nữ</span>
                        </label>
                    </div>
                    <div class="relative mb-7 form-group">
                        <label class="top-1/4 left-4 absolute text-gray-500 font-medium pointer-events-none transition-all" fType="lbl">Ngày sinh</label>
                        <input type="text" class="form-input px-4 py-3 bg-gray-100 outline-none text-gray-800 w-full transition-all border-b-2 border-gray-300 focus:border-black" fType="inp" name="dob" id="date" required/>
                    </div>
                    <div class="relative mb-7 form-group">
                        <label class="top-1/4 left-4 absolute text-gray-500 font-medium pointer-events-none transition-all" fType="lbl">Số điện thoại</label>
                        <input required autocomplete="off" type="tel" class="form-input px-4 py-3 bg-gray-100 outline-none text-gray-800 w-full transition-all border-b-2 border-gray-300 focus:border-black" fType="inp" name="phone" pattern="[0-9]{10}"/>
                    </div>
                    <div class="relative mb-7 form-group">
                        <label class="top-1/4 left-4 absolute text-gray-500 font-medium pointer-events-none transition-all" fType="lbl">Địa chỉ</label>
                        <input required autocomplete="off" type="text" class="form-input px-4 py-3 bg-gray-100 outline-none text-gray-800 w-full transition-all border-b-2 border-gray-300 focus:border-black" fType="inp" name="address" />
                    </div>
                    <div class="relative mb-7 form-group">
                        <label class="top-1/4 left-4 absolute text-gray-500 font-medium pointer-events-none transition-all" fType="lbl">Email</label>
                        <input required autocomplete="off" type="email" class="form-input px-4 py-3 bg-gray-100 outline-none text-gray-800 w-full transition-all border-b-2 border-gray-300 focus:border-black" fType="inp" readonly onfocus="this.removeAttribute('readonly');" name="email"/>
                    </div>
                    <div class="relative mb-7 form-group">
                        <label class="top-1/4 left-4 absolute text-gray-500 font-medium pointer-events-none transition-all" fType="lbl">Mật khẩu</label>
                        <input required autocomplete="off" type="password" class="px-4 py-3 bg-gray-100 outline-none text-gray-800 w-full transition-all border-b-2 border-gray-300 focus:border-black" fType="inp" readonly onfocus="this.removeAttribute('readonly');" name="password"/>
                    </div>
                    <div class="flex justify-between">
                        <button class="bg-black py-3 px-8 text-white border border-black hover:bg-white hover:text-gray-700 transition-all" id="submitRegister" name="submit">Đăng ký</button>
                        <div class="px-3 mr-auto ml-3">
                            <span class="text-gray-600">Đã có tài khoản?</span>
                            <br />
                            <a href="<?= BASE_URL ?>/Account/Login" class="text-gray-800 hover:text-black">Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require_once "./src/Views/Templates/sidebar.php" ?>
    <script src="<?= BASE_URL ?>/public/scripts/form.js?v=2"></script>
</body>

</html>