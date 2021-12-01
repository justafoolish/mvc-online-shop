<div class="fixed inset-0 flex justify-end hidden z-50 w-screen" id="sidebarwrap">
  <div id="sidebar" class="bg-white h-screen ml-auto inline-block pb-6 px-12 overflow-x-hidden w-96">
    <header class="sticky top-0 bg-white py-4 pt-10 z-40 flex justify-between">
      <h3 class="uppercase text-gray-600" id="sidebar-title">Tìm Kiếm</h3>
      <button id="closesidebar">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </header>
    <!-- search items -->
    <div id="searchPanel" class="hidden mb-5">
      <form class="flex justify-center sticky top-20 z-30 pb-2 bg-white" id="searchForm">
        <input type="text" placeholder="TÌM KIẾM SẢN PHẨM" class="px-4 py-3 my-3 bg-gray-100 outline-none placeholder-gray-400 text-gray-400 focus:bg-gray-200 w-full transition-all" />
      </form>
      <main id="searchProduct">
      </main>
    </div>
    <!-- cart items -->
    <div id="cartPanel" class="hidden py-5 mt-3"></div>
  </div>
</div>
