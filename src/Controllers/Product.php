<?php
class Product extends CustomerController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    public function index($pid = "")
    {
        
        if (empty($pid)) {
            header("Location: " . BASE_URL . "/Collection/");
        } else {
            $productModel = parent::model("ProductModel");

            $product = $productModel->getProductDetail(['MaSP' => $pid]); //Lấy thông tin sản phẩm theo product ID

            parent::view("Product.index", [
                "collections" => $this->collections,
                "product" => $product,
                "totalCartItem" => $this->totalCartItem,
                "customerLogin" => $this->customerLogin
            ]);
        }
    }

    public function getQuantity()
    {
        if (isset($_POST['size']) && $_POST['pid']) {

            $productModel = parent::model("ProductModel");

            $quantity = $productModel->getQuantity([
                "MaSP" => $_POST['pid'],
                "MaSize" => strtoupper($_POST['size'])
            ]);

            echo $quantity;
        }
    }
}
