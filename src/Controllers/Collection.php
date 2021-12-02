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
        $countFrom = ($currentPage-1)*$totalPage;

        $products = $productModel->getAllProducts("${countFrom}, 8");

        parent::view("Collection.index", [
            "collections" => $this->collections,
            "page" => "Index",
            "totalPage" => $totalPage,
            "currentPage" => $currentPage,
            "products" => $products,
            "totalCartItem" => $this->totalCartItem
        ]);
    }
    public function show()
    {
        $currentPage = empty($this->params[1]) ? '1' : $this->params[1];

        $collection = empty($this->params[0]) ? '' : $this->params[0];

        $productModel = parent::model("ProductModel");
        $productCount = $productModel->countTotalProducts($collection);

        $totalPage = ceil($productCount[0] / 8);

        $countFrom = ($currentPage-1)*$totalPage;
        $products = $productModel->getAllProducts("${countFrom}, 8", $collection);
        
        parent::view("Collection.index", [
            "collections" => $this->collections,
            "page" => "Show",
            "totalPage" => $totalPage,
            "currentPage" => $currentPage,
            "products" => $products,
            "category" => $collection,
            "totalCartItem" => $this->totalCartItem
        ]);
    }
}
