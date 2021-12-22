<div class="w-64 bg-gray-700 text-white">
    <a href="<?= BASE_URL ?>/Admin/Dashboard/" class="block p-5 sticky top-0">Logo</a>
    <nav class="sticky top-16">
        <a href="<?= BASE_URL ?>/Admin/Dashboard/" class="nav-item transition-all hover:bg-gray-600 hover:text-white text-gray-400 flex px-5 py-3 ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Tổng quan</a>
        <a href="<?= BASE_URL ?>/OrderManage/" class="nav-item transition-all hover:bg-gray-600 hover:text-white text-gray-400 flex px-5 py-3 ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Đơn hàng
        </a>
        <button id="sp" class="nav-item transition-all hover:bg-gray-600 hover:text-white text-gray-400 flex justify-between px-5 py-3 w-full">
            <span class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                Sản phẩm</span>
            <span class="transform transition duration-100 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </span>
        </button>
        <ul class="ml-12 h-0 transition-all overflow-hidden" id="sptarget">
            <li class="pl-2 text-sm text-gray-400 hover:bg-gray-600 hover:text-gray-200 py-1.5"><a href="<?= BASE_URL ?>/ProductManage/" class="block">Tất cả sản phẩm</a></li>
            <li class="pl-2 text-sm text-gray-400 hover:bg-gray-600 hover:text-gray-200 py-1.5"><a href="<?= BASE_URL ?>/CategoryManage/" class="block">Danh mục sản phẩm</a></li>
            <li class="pl-2 text-sm text-gray-400 hover:bg-gray-600 hover:text-gray-200 py-1.5"><a href="<?= BASE_URL ?>/ProductManage/Inventory/" class="block">Tồn kho</a></li>
        </ul>
        <a href="<?= BASE_URL ?>/CustomerManage/" class="nav-item transition-all hover:bg-gray-600 hover:text-white text-gray-400 flex px-5 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            Khách hàng
        </a>
        <a href="<?= BASE_URL ?>/DiscountManage/" class="nav-item transition-all hover:bg-gray-600 hover:text-white text-gray-400 flex px-5 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
            </svg>
            Khuyến mãi
        </a>
        <a href="<?= BASE_URL ?>/OrderManage/Report/" class="nav-item transition-all hover:bg-gray-600 hover:text-white text-gray-400 flex px-5 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Thống kê
        </a>
        <a href="<?= BASE_URL ?>/EmployeeManage/" class="nav-item transition-all hover:bg-gray-600 hover:text-white text-gray-400 flex px-5 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle h-6 w-6 mr-3" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="12" cy="12" r="9"></circle>
                <circle cx="12" cy="10" r="3"></circle>
                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
            </svg>
            Nhân Viên
        </a>
    </nav>
</div>