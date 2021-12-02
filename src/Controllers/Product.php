<?php
class Product extends BaseController
{
    function __construct($params)
    {
        parent::__construct($params);
    }
    function index() {
        header("Location: ".BASE_URL."/Collection/");
    }
    public function id($pid = "")
    {
        
        if(empty($pid)) {
            $this->index();
        }
        else {
            $productModel = parent::model("ProductModel");
            $product = $productModel->getProduct($pid);

            parent::view("Product.index", [
                "collections" => $this->collections,
                "product" => $product,
                "totalCartItem" => $this->totalCartItem
            ]);
        }
        
    }
}
