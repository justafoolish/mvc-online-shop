<?php
function getNavBar($location)
{
    echo "
    <header class='flex justify-between items-center py-2 sticky top-0 inset-x-0 bg-white z-10'>
        <h3 class='text-gray-700 text-xs'>{$location}</h3>
        <div class='flex items-center space-x-2 group relative' id='header'>
            <div class='group-hover:opacity-0 transition-all py-2'>
                <h3 class='text-sm text-right text-gray-900'>Khắc Tuấn</h3>
                <h3 class='text-sm text-right text-gray-700'>Admin</h3>
            </div>
            <div class='group-hover:opacity-0 transition-all w-9 overflow-hidden mr-2'>
                <img src='".BASE_URL."/public/images/107824882_303977137640006_5725713926320775589_n.jpg' alt='' class='max-w-full rounded-full object-center object-cover'>
            </div>
            <div class='absolute border-l-2 border-gray-400 pl-3 py-1 mb-3 group-hover:translate-y-0 transform translate-y-full transition-all opacity-0 group-hover:opacity-100 self-end'>
                <a href='".BASE_URL."/Admin/Index/Logout' class='text-gray-900'>Đăng Xuất</a>
            </div>
        </div>
    </header> ";
}
?>