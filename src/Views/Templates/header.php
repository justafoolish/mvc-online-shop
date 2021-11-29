<nav class="text-gray-100 flex bg-gray-900 justify-between items-center px-7 sticky inset-x-0 top-0 z-30" style="padding-top: 2px; padding-bottom: 2px">
    <a href="<?= BASE_URL ?>/Home/" class="font-medium">Hades Studio</a>
    <div class="flex items-center divide-x divide-gray-100 divide-opacity-60 text-xs">
        <div>
            <a class="text-gray-100 hover:text-gray-400" href="<?= BASE_URL ?>/Account/Login">Đăng nhập</a>
            <span>/</span>
            <a class="text-gray-100 hover:text-gray-400" href="<?= BASE_URL ?>/Account/Register">Đăng ký</a>
        </div>
        <div class="flex ml-5 pl-4">
            <button id="search">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
            <h3 class="mx-4">VND</h3>
            <button class="ml-10" id="cart">Giỏ Hàng(10)</button>
        </div>
    </div>
</nav>