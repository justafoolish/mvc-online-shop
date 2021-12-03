<?php
class Product extends BaseCustomer
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
            $this->index(); // Quay về trang chủ nếu không get được product ID
        }
        else {
            $productModel = parent::model("ProductModel");

            $product = $productModel->getProduct($pid); //Lấy thông tin sản phẩm theo product ID

            parent::view("Product.index", [
                "collections" => $this->collections,
                "product" => $product,
                "totalCartItem" => $this->totalCartItem,
                "customerLogin" => $this->customerLogin

            ]);
        }
        
    }
}
