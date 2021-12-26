<?php
class Collection extends CustomerController
{
    private $itemPerPage = 8; //Số sản phẩm mỗi trang

    public function __construct($params)
    {
        parent::__construct($params);
    }

    //Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $currentPage = empty($this->params[0]) ? '1' : $this->params[0]; //Số trang hiện tại

        $productModel = parent::model("ProductModel");
        /*----------    Phân trang    ----------*/
        //Lấy tổng số sản phẩm để tính tổng số trang cần thiết
        $productCount = $productModel->totalProduct();

        $totalPage = ceil($productCount / $this->itemPerPage); // Tổng số trang

        $countFrom = ($currentPage - 1) * $totalPage; // Số thự tự bắt đàu lấy sản phẩm trong records

        $products = $productModel->getAllProduct([$countFrom, $this->itemPerPage]);
        /*----------    Kết thúc phân trang    ----------*/

        parent::view("Collection.index", [
            "collections" => $this->collections,
            "page" => "Index",
            "totalPage" => $totalPage,
            "currentPage" => $currentPage,
            "products" => $products,
            "totalCartItem" => $this->totalCartItem,
            "customerLogin" => $this->customerLogin
        ]);
    }

    //Hiển thị danh sách sản phẩm theo danh mục
    public function show()
    {
        $currentPage = empty($this->params[1]) ? '1' : $this->params[1]; //Số trang hiện tại

        $collection = empty($this->params[0]) ? [] : ["DanhMuc" => $this->params[0]]; // Mã danh mục

        $productModel = parent::model("ProductModel");

        /*----------    Phân trang    ----------*/
        //Lấy tổng số sản phẩm để tính tổng số trang cần thiết
        $productCount = $productModel->totalProduct($collection);

        $totalPage = ceil($productCount / 8); // Tổng số trang

        $countFrom = ($currentPage - 1) * $totalPage; // Số thự tự bắt đàu lấy sản phẩm trong records

        $products = $productModel->getAllProduct([$countFrom, $this->itemPerPage], $collection);
        /*----------    Kết thúc phân trang    ----------*/

        parent::view("Collection.index", [
            "collections" => $this->collections,
            "page" => "Show",
            "totalPage" => $totalPage,
            "currentPage" => $currentPage,
            "products" => $products,
            "category" => $collection ? $collection['DanhMuc'] : "",
            "totalCartItem" => $this->totalCartItem,
            "customerLogin" => $this->customerLogin
        ]);
    }
}
