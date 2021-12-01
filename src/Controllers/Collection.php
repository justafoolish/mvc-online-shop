<?php
class Collection extends BaseController
{
    public function __construct($params)
    {
        parent::__construct($params);
    }
    public function index()
    {

        $currentPage = empty($this->params[0]) ? '1' : $this->params[0];

        $productModel = parent::model("ProductModel");
        $productCount = $productModel->countTotalProducts();

        $totalPage = ceil($productCount[0] / 8);

        $products = $productModel->getAllProducts($currentPage-1);

        parent::view("Collection.index", [
            "collections" => $this->collections,
            "page" => "Index",
            "totalPage" => $totalPage,
            "currentPage" => $currentPage,
            "products" => $products,
        ]);
    }
    public function show()
    {
        
        parent::view("Collection.index", [
            "collections" => $this->collections,
        ]);
    }
    public function product()
    {
        parent::view("Collection.product", [
            "collections" => $this->collections,
        ]);
    }
}
