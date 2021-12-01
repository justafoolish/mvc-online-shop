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
        $productModel = parent::model("ProductModel");
        $product = $productModel->getQuantityByVariant('4','M');

        echo $product[0]['SoLuong'];
        
    }
}
