<?php
class Home extends CustomerController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        $productModel = parent::model("ProductModel");
        $limit = [8];
        $latestProduct = $productModel->getLatestProducts($limit); // Lọc danh sách sản phẩm mới nhất
        // $this->print($this->customerLogin);
        parent::view("Home.index", [
            "collections" => $this->collections,
            "latestProduct" => $latestProduct,
            "totalCartItem" => $this->totalCartItem,
            "customerLogin" => $this->customerLogin
        ]);
    }
}
