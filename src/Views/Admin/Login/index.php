<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./src/Views/Admin/Templates/header.php" ?>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/styles/custom.css" />

</head>

<body>
    <div class="min-h-screen grid place-items-center">
        <div class="w-96 bg-gray-50 px-7 py-5 border">
            <form>
            <h3 class="uppercase text-xl font-medium px-2 text-gray-700 text-center my-3">Login as Admin</h3>
            <div class="relative my-4 form-group">
                <label class="top-1/6 mt-3 left-4 absolute text-gray-500 font-medium pointer-events-none transition-all" fType="lbl">Email</label>
                <input id="email" name="email" autocomplete="off" type="email" class="form-input px-4 py-3 bg-gray-100 outline-none text-gray-800 w-full transition-all border-b-2 border-gray-300 focus:border-black" fType="inp" required readonly onfocus="this.removeAttribute('readonly');" />
                <span class="text-red-500 mt-5 hidden" id="message"></span>
            </div>
            <div class="relative my-4 form-group">
                <label class="top-1/6 mt-3 left-4 absolute text-gray-500 font-medium pointer-events-none transition-all" fType="lbl">Password</label>
                <input id="password" name="password" autocomplete="off" type="password" class="form-input px-4 py-3 bg-gray-100 outline-none text-gray-800 w-full transition-all border-b-2 border-gray-300 focus:border-black" fType="inp" required readonly onfocus="this.removeAttribute('readonly');" />
                <span class="text-red-500 mt-5 hidden" id="message"></span>
            </div>
            <button id="login" class="my-3 bg-gray-400 w-full text-center py-3 text-sm font-medium text-gray-50 hover:bg-gray-500 transition-all" type="submit">Đăng nhập</button>
            </form>
        </div>
    </div>

    <script src="<?= BASE_URL ?>/public/admin/login.js?v=1"></script>
</body>

</html>