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

        $latestProduct = $productModel->getLatestProducts(); // Lọc danh sách sản phẩm mới nhất

        parent::view("Home.index", [
            "collections" => $this->collections,
            "latestProduct" => $latestProduct,
            "totalCartItem" => $this->totalCartItem,
            "customerLogin" => $this->customerLogin
        ]);
    }
}
