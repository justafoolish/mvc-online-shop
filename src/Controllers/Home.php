<?php
class Home extends CustomerController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    //Hiển thị màn hình trang chủ
    function index()
    {
        $productModel = parent::model("ProductModel");
        $limit = [8];
        $latestProduct = $productModel->getAllProduct($limit,[],["NgayNhap" => "DESC"]); // Lọc danh sách sản phẩm mới nhất
        // $this->print($this->customerLogin);
        parent::view("Home.index", [
            "collections" => $this->collections,
            "latestProduct" => $latestProduct,
            "totalCartItem" => $this->totalCartItem,
            "customerLogin" => $this->customerLogin
        ]);
    }
}
