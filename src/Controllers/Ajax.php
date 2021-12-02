<?php
class Ajax extends BaseController
{
    public function __construct($params)
    {
        parent::__construct($params);
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
    
    public function getcart() {
        $total = 450000;
        parent::view("Templates.sidecart",[
            "total" => $total,
            "carts" => isset($_SESSION["cart"]) ? $_SESSION["cart"] : [],
        ]);
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
}
