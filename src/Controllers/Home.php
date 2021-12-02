<?php
class Home extends BaseController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    function index()
    {
        $productModel = parent::model("ProductModel");
        $latestProduct = $productModel->getLatestProducts();

        parent::view("Home.index", [
            "collections" => $this->collections,
            "latestProduct" => $latestProduct,
            "totalCartItem" => $this->totalCartItem
        ]);
    }
}
