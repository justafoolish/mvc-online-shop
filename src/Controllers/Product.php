<?php
class Product extends CustomerController
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

    public function updatequantity() {
        if(isset($_POST['pid']) && isset($_POST['quantity'])) {
            $pid = $_POST['pid'];
            $quantity = $_POST['quantity'];
            $productModel = parent::model("ProductModel");
            echo $productModel->updateQuantity($pid,$quantity);
        }
        echo 0;  
    }

    public function getquantity() {
        if(isset($_POST['size']) && $_POST['pid']) {

            $productModel = parent::model("ProductModel");
            $product = $productModel->getQuantityByVariant($_POST['pid'],$_POST['size']);
            
            echo $product;
        }  
    }

    public function searchproduct() {
        $keyword= "";
        if(isset($_POST['keyword'])){
            $keyword = $_POST['keyword'];
        }
        $productModel = parent::model("ProductModel");
        $products = $keyword != "" ? $productModel->search($keyword) : [];


        parent::view("Templates.search",[
            "result" => $keyword,
            "products" => $products
        ]);
    }
}
