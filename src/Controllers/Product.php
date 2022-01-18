<?php
class Product extends CustomerController
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    //Hiển thị màn hình chi tiết sản phẩm
    public function index($pid = "")
    {
        if (strtolower($this->params[0]) === "search") {
            $keyword = "";
            if (isset($_POST['keyword'])) {
                $keyword = $_POST['keyword'];
            }
            $productModel = parent::model("ProductModel");
            $products = $keyword != "" ? $productModel->search($keyword) : [];


            parent::view("Templates.search", [
                "result" => $keyword,
                "products" => $products
            ]);
            return;
        }
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

    //Kiểm tra số lượng tồn kho sản phẩm
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
